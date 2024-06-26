<form class="flex pt-[20px]"  id="form_product">
    <!-- left -->
    <div class="px-[20px] max-w-[300px]">
        <!-- avatar -->
        <div class="p-[10px] shadow rounded-[10px] bg-white">
            <p class="text-center font-bold mb-[20px]">Image</p>
            <div class="text-center"><img class="inline-block w-[200px] aspect-square object-cover" src="" alt=""></div>
            <input type="file" name="img">
        </div>
        <!-- category -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">Category</p>
            <select name="category" id="category" class="w-full p-[10px] outline-none border mt-[10px]">
                <option value="">điện thoại</option>
            </select>
        </div>
        <!-- brand -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">Brands</p>
            <select name="brand" id="brand" class="w-full p-[10px] outline-none border mt-[10px]">
                <option value="">xiaomi</option>
            </select>
        </div>
        <!-- status -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">status</p>
            <select name="status" id="status" class="w-full p-[10px] outline-none border mt-[10px]">
                <option selected value="0">Active</option>
                <option value="1">Daft</option>
            </select>
        </div>
    </div>
    <!-- right -->
    <div class="flex-1 pr-[30px]">
        <div class="w-full rounded-[10px] bg-white p-[20px] shadow">
            <div>
                <label class="font-medium mb-[10px] block" for="">Product Name</label>
                <input name="productName" class="border w-full p-[10px] outline-none rounded-[5px]" type="text" placeholder="Product Name">
            </div>
            <div class="flex gap-[10px] mt-[25px]">
                <div class="flex-1">
                    <label class="font-medium mb-[10px] block" for="">Price Origin</label>
                    <input name="priceOrigin" class="border w-full p-[10px] outline-none rounded-[5px]" type="number" placeholder="Price Origin">
                </div>
                <div class="flex-1">
                    <label class="font-medium mb-[10px] block" for="">Price Sale</label>
                    <input name="priceSale" class="border w-full p-[10px] outline-none rounded-[5px]" type="number" placeholder="Price Sale">
                </div>
                <div class="flex-1">
                    <label class="font-medium mb-[10px] block" for="">Stocks</label>
                    <input name="stocks" class="border w-full p-[10px] outline-none rounded-[5px]" type="number" placeholder="Stocks">
                </div>
            </div>
            <div class="mt-[25px]">
                <label class="font-medium mb-[10px] block" for="">Short Description</label>
                <textarea class="border w-full p-[10px] outline-none rounded-[5px]" name="sDes" id="" cols="30" rows="5"></textarea>
            </div>

            <div class="mt-[25px]">
                <label class="font-medium mb-[10px] block" for="">Image Details</label>
                <div class="img-details flex flex-wrap gap-[20px] pb-[15px]">
                    <img src="../../img/laptop.png" alt="">
                    <img src="../../img/laptop.png" alt="">
                </div>
                <input class="border w-full p-[10px] outline-none rounded-[5px]" type="file" name="img_details[]" multiple>
            </div>

            <div class="mt-[25px]">
                <label class="font-medium mb-[10px] block" for="">Long Description</label>
                <textarea class="border w-full p-[10px] outline-none rounded-[5px]" name="lDes" id="ckediter" cols="30"></textarea>
            </div>
            <div class="mt-[25px]">
                <input type="submit" class="block bg-[#17C653] hover:bg-[#04B440] text-white px-[20px] rounded-[10px] leading-[40px] cursor-pointer" value="Add">
            </div>
        </div>
    </div>
</form>



<script src="public/js/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckediter'))
        .catch(error => {
            console.error(error);
        });

        const arrCategory = <?php echo json_encode($category); ?>;
        const arrBrand = <?php echo json_encode($brands); ?>;

        const category = document.querySelector('#category');
        const brand = document.querySelector('#brand');
        const status = document.querySelector('#status');

        category.innerHTML = '';
        arrCategory.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            category.appendChild(option);
        });

        brand.innerHTML = '';
        arrBrand.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            brand.appendChild(option);
        });

        const validate = {
            img : value => {
                if(value.name == ''){
                    return 'Vui lòng chọn ảnh sản phẩm';
                }
                return false;
            },
            productName : value => {
                if(value.trim() == ''){
                    return 'Vui lòng nhập tên sản phẩm';
                }
                return false;
            },
            priceOrigin : value => {
                if(value.trim() == ''){
                    return 'Vui lòng nhập giá gốc';
                }
                return false;
            },
            priceSale : value => {
                if(value.trim() == ''){
                    return 'Vui lòng nhập giá bán';
                }
                return false;
            },
            stocks : value => {
                if(value.trim() == ''){
                    return 'Vui lòng nhập số lượng';
                }
                return false;
            },
            sDes : value => {
                if(value.trim() == ''){
                    return 'Vui lòng nhập mô tả sản phẩm';
                }
                return false;
            }
        }

        const form = document.querySelector('#form_product');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(form);
            let check = false;
            for (let [key, value] of formData) {
                if(validate[key]){
                    const error = validate[key](value);
                    if(error){
                        check = true;
                        toast({
                            title: 'Warning',
                            message: error,
                            type: 'warning'
                        });
                        break;
                    }
                }
            }

            if(check) return;

            load(1);
            fetch('admin/products/addpost', {
                method: 'POST',
                body: formData
            }).then(res => res.json())
            .then(data => {
                console.log(data);
                load(0);
                if(data.status == 1){
                    toast({
                        title: 'Success',
                        message: 'Add product success',
                        type: 'success'
                    });
                    form.reset();
                }else{
                    toast({
                        title: 'Error',
                        message: 'Add product fail',
                        type: 'fail'
                    });
                }
            })
            .catch(err => {
                load(0);
                toast({
                    title: 'Error',
                    message: err,
                    type: 'fail'
                });
                console.log(err);
            });
            
        });


</script>