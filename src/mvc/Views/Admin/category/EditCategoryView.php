   <div class="editcategory w-[90%] mx-auto mt-[20px] p-[20px] shadow rounded-[10px]">
       <div>
           <form class="flex flex-col justify-center gap-[20px]" action="" id="category_form">
                <input type="text" name="id" hidden>
               <input class="bg-[#F9F9F9] p-[10px] rounded-[10px] outline-none" type="text" name="categoryName" placeholder="Category Name">
               <div class="flex gap-[15px]">
                   <button class="block bg-[#17C653] hover:bg-[#04B440] text-white py-[5px] px-[10px] rounded-[5px] cursor-pointer w-fit" id="update">Update</button>
                   <p class="block bg-[#17C653] hover:bg-[#04B440] text-white py-[5px] px-[10px] rounded-[5px] cursor-pointer w-fit" id="default">Default</p>
               </div>

           </form>
       </div>
   </div>


   <script>

         const categoryjson = <?= json_encode($category) ?>;
        const form = document.getElementById("category_form");
        const categoryname = form.querySelector("input[name='categoryName']");
        const id = form.querySelector("input[name='id']");
        id.value = categoryjson.id;
        categoryname.value = categoryjson.name;

        const defaultbtn = document.getElementById("default");
        defaultbtn.addEventListener("click", function(){
            categoryname.value = categoryjson.name;
        });

        form.addEventListener("submit", function(e){
            e.preventDefault();
            const formData = new FormData(form);
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
                fetch("admin/category/updatepost", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        load(0);
                        if(data.status == 1){
                            toast({
                                title: "Success!",
                                message: "Update Category Success",
                                type: "success"
                            });
                            setTimeout(() => {
                                window.location.href = "admin/category";
                            }, 1000);
                        }else{
                            toast({
                                title: "Error",
                                message: "Update Category Fail",
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
                    });
            }
        });

   </script>