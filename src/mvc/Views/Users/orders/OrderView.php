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
        outline: none;
        border: none;
    }

    .dv_container .dv_btn_fail>button:hover {
        background-color: rgb(199, 55, 55);
    }

    .dv_container .dv_btn_fail>button.disabled {
        background-color: gray !important;
        cursor: not-allowed;
    }

    .dv_container .div_thanhtoan {
        font-weight: bold;
        background-color: green;
        padding: 10px;
        color: white;
        margin-top: 15px;
    }

    .dnone {
        display: none !important;
    }
</style>


<div class="dv_container">
    <div class="dv_title">My order</div>

    <div class="dv_orders">

        <div class="dv_order">
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
                    <button disabled class="disabled">Hủy đơn hàng</button>
                </div>

            </div>
        </div>

        <div class="dv_order">
            2 don hang
        </div>

    </div>


</div>



<script>
    const orders = <?= json_encode($data['orders']) ?>;

    let arrorder = [];
    for (let item in orders) {
        arrorder.push(orders[item]);
    }
    arrorder.reverse();

    renderorder(arrorder);

    function renderorder(data) {

        let orders = document.querySelector(".dv_orders");
        orders.innerHTML = "";
        // for (let item in data) {
        data.forEach(oneorder => {
            let order = document.createElement("div");
            order.classList.add("dv_order");
            order.innerHTML = `
            <div class="orders_detail">
            
            </div>
            <div class="div_orderinfo">
                <div class="div_orderinfo_full">
                    <div class="div_orderinfo_1">
                        <p class="dv_label">Ngày đặt: <span>${oneorder.created_at}</span></p>
                        <p class="dv_label">Tên người nhận: <span>${oneorder.fullname}</span></p>
                        <p class="dv_label">Số điện thoại: <span>${oneorder.phone}</span></p>
                        <p class="dv_label">Email: <span>${oneorder.email}</span></p>
                        <p class="dv_label">Địa chỉ: <span>${oneorder.shipping_address}</span></p>
                        <p class="div_thanhtoan">Thanh toán khi nhận hàng</p>
                    </div>
                    <div class="div_orderinfo_note">
                        <p class="dv_label">Ghi chú: </p>
                        <p>${oneorder.notes}</p>
                    </div>
                    <div class="div_orderinfo_status">
                        <p class="dv_label">Trạng Thái</p>
                        <p>${oneorder.status}</p>
                    </div>

                    <div class="div_orderinfo_total">
                        <p class="dv_label">Tổng tiền</p>
                        <p>${format(oneorder.total_price)} VND</p>
                    </div>
                </div>
                <div class="dv_btn_fail">
                    <button data-idorder="${oneorder.order_id}" class="update">Hủy đơn hàng</button>
                </div>

            </div>
            `;

            let order_detail = order.querySelector(".orders_detail");
            order_detail.innerHTML = "";
            oneorder.details.forEach(item => {
                let order_item = document.createElement("div");
                order_item.classList.add("order_item");
                order_item.innerHTML = `
                   <img class="dv_img_item" src="public/img/imgproducts/${item.img_url}" alt="">
                    <p class="ten">${item. product_name}</p>
                    <p class="gia">${format(item.price)} vnd</p>
                    <p class="soluong">${item.quantity}</p>
                    <p>${format(item.total)} VND</p>
                `;
                order_detail.appendChild(order_item);
            });

            const update = order.querySelector(".update");
            if (oneorder.idstatus == 3 || oneorder.idstatus == 4) {
                update.classList.add("dnone");
            } else if (oneorder.idstatus == 2) {
                update.classList.add("disabled");
                update.setAttribute("disabled", true);
            } else {
                update.addEventListener("click", async function() {
                    let idorder = update.getAttribute("data-idorder");
                    let data1 = {
                        idorder: idorder
                    };
                    let check = await myconfirm("Bạn có chắc chắn muốn hủy đơn hàng này không");
                    if (check) {
                        MyFetch("order/updatestatus", data1, (data) => {
                            console.log(data);
                            if (data.status == 1) {
                                toast({
                                    title: "Success",
                                    message: "Đơn hàng của bạn đã được hủy",
                                    type: "success"
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                                
                            }
                        });
                    }

                });
            }




            orders.appendChild(order);
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