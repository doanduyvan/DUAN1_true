


<div class="addcategory w-[90%] mx-auto mt-[20px] p-[20px] shadow rounded-[10px]">
    <div>
        <form class="flex flex-col justify-center gap-[20px]" id="form_brand" >
            <input class="bg-[#F9F9F9] p-[10px] rounded-[10px] outline-none" type="text" name="brandName" placeholder="Brands Name">
            <button class="block bg-[#17C653] hover:bg-[#04B440] text-white py-[5px] px-[10px] rounded-[5px] cursor-pointer w-fit">Add</button>
        </form>
    </div>
</div>

<a href="https://localhost/asmphp/live.html"></a>


<script>
    const form = document.getElementById("form_brand");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        let check = true;

        for (let [name, value] of formData) {
            if (!value) {
                check = false;
                toast({
                    title: "Warning",
                    message: "Không được để trống!",
                    type: "warning"
                });
            }
        }

        if (check) {
            load(1);
            fetch("admin/brand/addpost", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    load(0);
                    if(data.status == 1){
                        form.reset();
                        toast({
                            title: "Success!",
                            message: "Add Category Success",
                            type: "success"
                        });
                    }else{
                        toast({
                            title: "Error",
                            message: "Add Category Fail",
                            type: "fail"
                        });
                    }
                })
                .catch((error) => {
                    load(0);
                    toast({
                            title: "Error",
                            message: error,
                            type: "fail"
                        });
                    console.error('Error:', error);
                });
        }
    });
</script>