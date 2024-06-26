<div class="w-[90%] mx-auto mt-[20px] p-[20px] shadow rounded-[10px]">
    <div class="flex justify-between items-center">
        <div>
            <form action="">
                <input type="text" class="p-[10px] bg-[#F9F9F9] rounded-[5px] outline-none hover:shadow" placeholder="Search Products">
            </form>
        </div>
        <div class="flex justify-center items-center gap-[25px]">
            <div class="">
                <select name="" id="" class="outline-none bg-[#F9F9F9] p-[10px] rounded-[5px]">
                    <option value="" selected disabled>Status</option>
                    <option value="">ALL</option>
                    <option value="">Active</option>
                    <option value="">Non Active</option>
                </select>
            </div>
            <div>
                <a href="admin/products/add" class="block bg-[#17C653] hover:bg-[#04B440] text-white py-[8px] px-[10px] rounded-[5px] cursor-pointer w-fit">Add Products</a>
            </div>
        </div>
    </div>

    <table class="products-table">
        <thead>
            <th>Products</th>
            <th>Qty</th>
            <th>Price origin</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody id="list-products">
            <tr>
                <td>
                    <div class="block_img">
                        <img class="img-product" src="../../img/laptop.png" alt="">
                        <p>Product Name</p>
                    </div>
                </td>
                <td>5</td>
                <td>1000</td>
                <td>500</td>
                <td>Active</td>
                <td>
                    <div class="block_edit">
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#FFD43B" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </a>
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#ff0000" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

</div>

<?php
// print_r($products);
?>


<script>
    const arrProducts = <?php echo json_encode($products); ?>;

    console.log(arrProducts);
    showproducts(arrProducts);

    function showproducts(data) {
        const status = {
            0 : 'Active',
            1 : 'Daft'
        }
        const listProducts = document.getElementById('list-products');
        listProducts.innerHTML = '';
        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="block_img">
                        <img class="img-product" src="public/img/imgproducts/${item.img_url}" alt="">
                        <p>${item.product_name}</p>
                    </div>
                </td>
                <td>${item.stock_quantity}</td>
                <td>${item.price}</td>
                <td>${item.price_sale}</td>
                <td>${status[item.statusproduct] ?? "Chưa cập nhật trạng thái"}</td>
                <td>
                    <div class="block_edit">
                        <a href="admin/products/edit/${item.id}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#FFD43B" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </a>
                        <a href="#" class="" id="delproduct">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#ff0000" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </a>
                    </div>
                </td>
            `;
            listProducts.appendChild(tr);
            tr.onclick = function(e) {
                if(e.target.closest('#delproduct')){
                    e.preventDefault();
                    const id = item.id;
                    const imgUrl = item.img_url ?? '';
                    if(confirm(`Are you sure you want to delete this ${item.product_name} ?`)){
                        deleteProduct(tr,id,imgUrl);
                    }
                }
            }
        });

        function deleteProduct(tr,id,imgUrl){
            load(1);
            fetch("admin/products/delpost", {
                method: "POST",
                body: JSON.stringify({id:id,imgUrl : imgUrl})
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                load(0);
                if(data.status == 1){
                    toast({
                        title: "Success!",
                        message: "Delete Product Success",
                        type: "success"
                    });
                    tr.remove();
                }else{
                    toast({
                        title: "Error",
                        message: "Delete Product Fail",
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