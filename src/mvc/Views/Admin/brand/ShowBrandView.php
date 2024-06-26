


<div class="showcategory w-[90%] mx-auto mt-[20px] p-[20px] shadow rounded-[10px]">
    <div class="flex justify-between items-center">
        <div>
            <form action="" method="get">
                <input name="search" class="bg-[#F9F9F9] p-[10px] rounded-[10px] outline-none" type="text" placeholder="Search Brands">
                <input class="inline-block bg-[#17C653] hover:bg-[#04B440] text-white py-[5px] px-[10px] rounded-[5px] cursor-pointer ml-[10px]" type="submit" value="Submit">
            </form>
        </div>
        <div>
            <a class="block bg-[#17C653] hover:bg-[#04B440] text-white px-[20px] rounded-[10px] leading-[40px]" href="admin/brand/add">Add Brands</a>
        </div>
    </div>

    <div class="mt-[25px]">
        <ul class="ul">
            <li class="li limenu">
                <div>Brands</div>
                <div>actions</div>
            </li>
            <!-- danh sach -->
            <div class="full-list" id="fullList">

                <li class="li list">
                    <div class="left">Apple</div>
                    <div class="right">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#FFD43B" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#ff0000" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </a>
                    </div>
                </li>
 

            </div>
        </ul>
    </div>

</div>


<script>
    const arrbrands = <?= json_encode($brands) ?>;

    // console.log(arrbrands);

    showcategory(arrbrands);

    function showcategory(data) {
        const fullList = document.getElementById("fullList");
        fullList.innerHTML = "";
        data.forEach(value => {
            const li = document.createElement("li");
            li.classList.add("li", "list");
            li.innerHTML = `
                    <div class="left">${value.name}</div>
                    <div class="right">
                        <a href="admin/brand/edit/${value.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#FFD43B" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </a>
                        <p class="delbrand cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#ff0000" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </p>
                    </div>
                    `;
            fullList.appendChild(li);

            li.onclick = function(e) {
                if (e.target.closest('.delbrand')) {
                    let id = value.id;
                    let check = confirm(`Bạn có chắc chắn muốn xóa brand ${value.name} không?`);
                    if(check){
                        deleteCategory(li,id);
                    }
                }
            }

        });

        function deleteCategory(li,id){
            load(1);
            fetch("admin/brand/delpost", {
                method: "POST",
                body: JSON.stringify({id:id})
            })
            .then(response => response.json())
            .then(data => {
                load(0);
                if(data.status == 1){
                    toast({
                        title: "Success!",
                        message: "Delete Category Success",
                        type: "success"
                    });
                    li.remove();
                }else{
                    toast({
                        title: "Error",
                        message: "Delete Category Fail",
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

    }
</script>