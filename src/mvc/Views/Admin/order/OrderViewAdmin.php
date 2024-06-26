<style>
    .dv_container p {
        margin: 0;
        padding: 0;
    }

    .dv_container {
        /* background-color: red; */
        max-width: 1140px;
        padding: 40px 10px;
        margin: 0 auto;
    }

    .dv_container .dv_title {
        font-size: 24px;
        font-weight: bold;

    }

    .dv_container .dv_orders {
        margin-top: 20px;
    }

    .dv_container .dv_order {
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px gray;
        margin-bottom: 40px;
    }

    .dv_container .dv_img_item {
        max-width: 100px;
        aspect-ratio: 4/5;
        object-fit: cover;
    }





    .dv_container .orders_detail .order_item {
        display: flex;
        gap: 15px;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px dashed gray;
    }

    .dv_container .orders_detail .order_item .ten,
    .dv_container .orders_detail .order_item .soluong,
    .dv_container .orders_detail .order_item .gia {
        text-align: center;
        flex: 1;
    }

    .dv_container .div_orderinfo {
        padding: 15px;
    }

    .dv_container .div_orderinfo_full {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .dv_container .dv_label {
        font-weight: bold;
    }

    .dv_container .dv_label>span {
        font-weight: normal;
    }

    .dv_container .dv_btn_fail {
        margin-top: 10px;
        display: flex;
        justify-content: end;
    }

    .dv_container .dv_btn_fail>button {
        font-weight: bold;
        background-color: rgb(199, 81, 81);
        display: inline-block;
        color: white;
        padding: 10px;
        cursor: pointer;
    }

    .dv_container .dv_btn_fail>button:hover {
        background-color: rgb(199, 55, 55);
    }

    .dv_container .dv_btn_fail>button.disabled {
        background-color: gray !important;
        cursor: not-allowed !important;
    }

    .dv_container .div_thanhtoan {
        font-weight: bold;
        background-color: green;
        padding: 10px;
        color: white;
        margin-top: 15px;
    }

    .dv_container .dv_btn_fail select {
        padding: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        margin-right: 30px;
        min-width: 100px;
    }

    .dv_container .dv_account {
        font-weight: bold;
        font-size: 20px;
    }

    .dv_container .dv_account>a {
        font-weight: normal;
        color: blue;
    }

    .dv_container .dv_account>a:hover {
        text-decoration: underline;
    }
</style>


<div class="dv_container">
    <div class="dv_title">Orders</div>

    <div class="dv_orders">

        <div class="dv_order">
            <div class="dv_account">Account: <a href="">duy van</a></div>
            <div class="orders_detail">
                <div class="order_item">
                    <img class="dv_img_item" src="public/img/laptop.png" alt="">
                    <p>lap top</p>
                    <p>25000 vnd</p>
                    <p>so luong</p>
                    <p>tong tien</p>
                </div>
            </div>
            <div class="div_orderinfo">
                <div class="div_orderinfo_full">
                    <div class="div_orderinfo_1">
                        <p class="dv_label">Ngày đặt: <span>2024</span></p>
                        <p class="dv_label">Tên người nhận: <span>Đoàn Duy Vấn</span></p>
                        <p class="dv_label">Số điện thoại: <span>034040404</span></p>
                        <p class="dv_label">Email: <span>duyvan@gmail.com</span></p>
                        <p class="dv_label">Địa chỉ: <span>35 Hồ Quý Ly Thanh Khê Đà Nẵng</span></p>
                    </div>
                    <div class="div_orderinfo_note">
                        <p class="dv_label">Ghi chú: </p>
                        <p>làm ơn nhẹ tay</p>
                    </div>
                    <div class="div_orderinfo_status">
                        <p class="dv_label">Trạng Thái</p>
                        <p>Đang chờ sư lí</p>
                    </div>

                    <div class="div_orderinfo_total">
                        <p class="dv_label">Tổng tiền</p>
                        <p>15,000,000 VND</p>
                    </div>
                </div>
                <div class="dv_btn_fail">
                    <select name="" id="">
                        <option value="">huy</option>
                    </select>
                    <button disabled class="" id="update">Update</button>

                </div>

            </div>
        </div>
    </div>
</div>



<script>
    const orders = <?php echo json_encode($data['orders']); ?>;
    const status = <?php echo json_encode($data['status']); ?>;
    let arrorders = [];
    for (let item in orders) {
        arrorders.push(orders[item]);
    }
    arrorders.reverse();

    // console.log(status);
    renderorder(arrorders, status);

    function renderorder(data, status) {
        const dv_orders = document.querySelector('.dv_orders');
        dv_orders.innerHTML = "";

        data.forEach(item => {
            const dv_order = document.createElement('div');
            dv_order.classList.add('dv_order');
            dv_order.innerHTML = `
         <div class="dv_account">Account: <a href="admin/account/${item.iduser}">${item.nameuser}</a></div>
            <div class="orders_detail">
            </div>
            <div class="div_orderinfo">
                <div class="div_orderinfo_full">
                    <div class="div_orderinfo_1">
                        <p class="dv_label">Ngày đặt: <span>${item.created_at}</span></p>
                        <p class="dv_label">Tên người nhận: <span>${item.nameorder}</span></p>
                        <p class="dv_label">Số điện thoại: <span>${item.phoneorder}</span></p>
                        <p class="dv_label">Email: <span>${item.emailorder}</span></p>
                        <p class="dv_label">Địa chỉ: <span>${item.shipping_address}</span></p>
                    </div>
                    <div class="div_orderinfo_note">
                        <p class="dv_label">Ghi chú: </p>
                        <p>${item.noteorder}</p>
                    </div>
                    <div class="div_orderinfo_status">
                        <p class="dv_label">Trạng Thái</p>
                        <p class="dv_status_u">${status[item.status]}</p>
                    </div>

                    <div class="div_orderinfo_total">
                        <p class="dv_label">Tổng tiền</p>
                        <p>${format(item.total_price)} VND</p>
                    </div>
                </div>
                <div class="dv_btn_fail">
                    <select class="status" name="" id="">
                        
                    </select>
                    <button disabled class="update disabled" data-idorder="${item.order_id}">Update</button>
                    
                </div>

            </div>
        `;
            // render detail
            const orders_detail = dv_order.querySelector('.orders_detail');
            orders_detail.innerHTML = "";
            item.details.forEach(itemdetail => {
                const order_item = document.createElement('div');
                order_item.classList.add('order_item');
                order_item.innerHTML = `
                    <img class="dv_img_item" src="public/img/imgproducts/${itemdetail.img_url}" alt="">
                    <p>${itemdetail.product_name}</p>
                    <p>${format(itemdetail.price)} VND</p>
                    <p>${itemdetail.quantity}</p>
                    <p>${format(itemdetail.total)} VND</p>
                    `;
                orders_detail.appendChild(order_item);
            });
            // render option status

            const statusElement = dv_order.querySelector('.status');
            // for (let key in status) {
            status.forEach((value, key) => {
                const option = document.createElement('option');
                option.value = key;
                option.innerText = value;
                option.selected = item.status == key;
                statusElement.appendChild(option);
            });
            statusElement.addEventListener('change', () => {
                const update = dv_order.querySelector('.update');
                update.disabled = false;
                update.classList.remove('disabled');
                update.onclick = (() => {
                    let idorder = update.getAttribute('data-idorder');
                    let status = statusElement.value;
                    let data = {
                        idorder: idorder,
                        status: status
                    };
                    MyFetch('admin/order/updatestatus', data, (data) => {
                        const dv_status_u = dv_order.querySelector('.dv_status_u');
                        if (data.status == 1) {
                            toast({
                                title: 'Success',
                                message: 'Update success',
                                type: 'success'
                            })
                        dv_status_u.innerText = statusElement.options[statusElement.selectedIndex].text;
                        update.disabled = true;
                        update.classList.add('disabled');
                        } else {
                            toast({
                                title: 'Error',
                                message: 'Update fail',
                                type: 'fail'
                            })
                        }
                    });
                });
            });

            dv_orders.appendChild(dv_order);
        });
    }



    function MyFetch(url, data, callback) {
        load(1);
        fetch(url, {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
            .then(data => {
                load(0);
                callback(data);
            })
            .catch((error) => {
                load(0);
                console.error('Error:', error);
            });
    }
</script>