<form class="flex pt-[20px]" id="form_product">
    <input type="text" name="id" hidden>
    <!-- left -->
    <div class="px-[20px] max-w-[300px]">
        <!-- avatar -->
        <div class="p-[10px] shadow rounded-[10px] bg-white">
            <p class="text-center font-bold mb-[20px]">Image</p>
            <div class="text-center"><img id="imgdisplay" class="inline-block w-[200px] aspect-square object-cover" src="" alt=""></div>
            <input type="file" name="img">
        </div>
        <!-- category -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">Category</p>
            <select name="category" id="category" class="w-full p-[10px] outline-none border mt-[10px]">
                <option value="">điện thoại</option>
                <option value="">laptop</option>
            </select>
        </div>
        <!-- brand -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">Brands</p>
            <select name="brand" id="brand" class="w-full p-[10px] outline-none border mt-[10px]">
                <option value="">xiaomi</option>
                <option value="">samsung</option>
            </select>
        </div>
        <!-- status -->
        <div class="p-[10px] shadow rounded-[10px] mt-[25px] bg-white">
            <p class="text-center font-bold">status</p>
            <select name="status" id="status" class="w-full p-[10px] outline-none border mt-[10px]">
                <option value="0">Active</option>
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
                    <!-- <img src="../../img/laptop.png" alt="">
                    <img src="../../img/laptop.png" alt=""> -->
                </div>
                <input class="border w-full p-[10px] outline-none rounded-[5px]" type="file" name="img_details[]" multiple>
            </div>

            <div class="mt-[25px]">
                <label class="font-medium mb-[10px] block" for="">Long Description</label>
                <textarea class="border w-full p-[10px] outline-none rounded-[5px]" name="lDes" id="ckediter" cols="30"></textarea>
            </div>
            <div class="mt-[25px]">
                <input type="submit" class="block bg-[#17C653] hover:bg-[#04B440] text-white px-[20px] rounded-[10px] leading-[40px] cursor-pointer" value="Update">
            </div>
        </div>
    </div>
</form>


<script src="public/js/ckeditor.js"></script>
<script>


    const arrBrand = <?= json_encode($brands) ?>;
    const arrCategory = <?= json_encode($category) ?>;
    const product = <?= json_encode($product) ?>;
    const arrimgdetails = <?= json_encode($imgdetails) ?>;
    console.log(arrimgdetails);

    const category = document.querySelector('#category');
    const brand = document.querySelector('#brand');
    const status = document.querySelector('#status');
    const imgdetailsElement = document.querySelector('.img-details');

    category.innerHTML = '';
    arrCategory.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id;
        option.selected = item.id == product.productcategory_id;
        option.textContent = item.name;
        category.appendChild(option);
    });

    brand.innerHTML = '';
    arrBrand.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id;
        option.selected = item.id == product.brands_id;
        option.textContent = item.name;
        brand.appendChild(option);
    });
    selectOption();
    function selectOption() {
        var selectElement = document.getElementById('status');
        var options = selectElement.options;
        for (var i = 0; i < options.length; i++) {
            if (options[i].value == product.statusproduct) {
                options[i].selected = true;
            } else {
                options[i].selected = false;
            }
        }
    }

    imgdetailsElement.innerHTML = '';
    arrimgdetails.forEach(item => {

        const divimg = document.createElement('div');
        divimg.classList.add('dv_img_details');
        //
        divimg.innerHTML = `
        <img src="public/img/imgproducts/${item.img_url}" alt="">
        <input type="checkbox" id="lb${item.id}" name="img_details_delete[]" hidden value="${item.id}">
        <label for="lb${item.id}">
        <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512"><path fill="#aa0808" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </label>
        `;
        //
        imgdetailsElement.appendChild(divimg);
        divimg.onclick = function(e) {
            if (e.target.closest(`#lb${item.id}`)){
                divimg.style.display = 'none';
            }
            
        }
    });

    const form = document.querySelector('#form_product');
    const id = form.querySelector('input[name="id"]');
    const productName = form.querySelector('input[name="productName"]');
    const priceOrigin = form.querySelector('input[name="priceOrigin"]');
    const priceSale = form.querySelector('input[name="priceSale"]');
    const stocks = form.querySelector('input[name="stocks"]');
    const sDes = form.querySelector('textarea[name="sDes"]');
    const lDes = form.querySelector('textarea[name="lDes"]');
    const img = form.querySelector('input[name="img"]');

    id.value = product.id;
    productName.value = product.product_name;
    priceOrigin.value = product.price;
    priceSale.value = product.price_sale;
    stocks.value = product.stock_quantity;
    sDes.innerHTML = product.des_short;
    lDes.innerHTML = product.des;

    const imgdisplay = document.querySelector('#imgdisplay');
    imgdisplay.src = `public/img/imgproducts/${product.img_url}`;

    let editorInstance
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        editorInstance.updateSourceElement();
        const formData = new FormData(form);

        load(1);
        fetch('admin/products/updatepost', {
            method: 'POST',
            body: formData
        }).then(res => res.json())
        .then(data => {
            
            load(0);
            if(data.status == 1){
                toast({
                    title: 'Success',
                    message: 'Update product success',
                    type: 'success'
                });
                setTimeout(() => {
                    window.location.href = 'admin/products';
                }, 1000);
            }else{
                toast({
                    title: 'Error',
                    message: 'Update product fail',
                    type: 'fail'
                });
            }
            console.log(data);
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

    ClassicEditor
        .create(document.querySelector('#ckediter'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>