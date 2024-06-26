 
 <style>
        .dv_overllay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 200;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
            visibility: hidden;
            opacity: 0;
            transition: all 0.5s;
        }
        .dv_overllay .thongbao{
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            text-align: center;
        }

        .dv_overllay .thongbao>a{
            background-color: green;
            color: white;
            display: inline-block;
            padding: 5px 20px;
            border-radius: 5px;
        }
        .dv_overllay.hidden{
            visibility: visible;
            opacity: 1;
            transition: all 0.5s;
        }
 </style>
 
 
 <div class="dv_overllay" id="dv_overllay_1">
    <div class="thongbao">
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> Bạn đã đặt hàng thành công.
        </div>
        <a href="order">OK</a>
    </div>
 </div>
 
 
 <!--================Home Banner Area =================-->
 <section class="banner_area">
     <div class="banner_inner d-flex align-items-center">
         <div class="container">
             <div class="banner_content d-md-flex justify-content-between align-items-center">
                 <div class="mb-3 mb-md-0">
                     <h2>Product Checkout</h2>
                     <p>Very us move be blessed multiply night</p>
                 </div>
                 <div class="page_link">
                     <a href="index.html">Home</a>
                     <a href="checkout.html">Product Checkout</a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--================End Home Banner Area =================-->

 <!--================Checkout Area =================-->
 <section class="checkout_area section_gap">
     <div class="container">
         <div class="cupon_area">
             <div class="check_title">
                 <h2>
                     Nhập mã giảm giá
                 </h2>
             </div>
             <input type="text" placeholder="Enter coupon code" />
             <a class="tp_btn" href="#">Apply Coupon</a>
         </div>
         <div class="billing_details">
             <div class="row">
                 <div class="col-lg-8">
                     <h3>Billing Details</h3>
                     <form class="row contact_form" action="#" method="post" id="formCheckout">
                         <div class="col-md-12 form-group p_star">
                             <input type="text" class="form-control" id="first" name="name" placeholder="Full name *" />
                             <!-- <span class="placeholder" data-placeholder="Full name"></span> -->
                         </div>

                         <div class="col-md-6 form-group p_star">
                             <input type="text" class="form-control" id="number" name="number" placeholder="Number Phone *" />
                             <!-- <span class="placeholder" data-placeholder="Phone number"></span> -->
                         </div>
                         <div class="col-md-6 form-group p_star">
                             <input type="text" class="form-control" id="email" name="email" placeholder="Email *" />
                             <!-- <span class="placeholder" data-placeholder="Email Address"></span> -->
                         </div>
                         <div class="col-md-12 form-group p_star">
                             <input type="text" class="form-control" id="add1" name="add1" placeholder="Address *" />
                             <!-- <span class="placeholder" data-placeholder="Address line 01"></span> -->
                         </div>
                         <div class="col-md-12 form-group">
                             <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                         </div>
                     </form>
                 </div>
                 <div class="col-lg-4">
                     <div class="order_box">
                         <h2>Your Order</h2>
                         <ul class="list" id="renderCheckout">
                             <li>
                                 <a href="#">Product
                                     <span>Total</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">Fresh Blackberry
                                     <span class="middle">x 02</span>
                                     <span class="last">$720.00</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">Fresh Tomatoes
                                     <span class="middle">x 02</span>
                                     <span class="last">$720.00</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">Fresh Brocoli
                                     <span class="middle">x 02</span>
                                     <span class="last">$720.00</span>
                                 </a>
                             </li>
                         </ul>
                         <ul class="list list_2">
                             <li>
                                 <a href="#">Total
                                     <span id="totalProduct">$2210.00</span>
                                 </a>
                             </li>
                         </ul>
                         <div class="payment_item">
                             <div class="radion_btn">
                                 <input type="radio" checked id="f-option5" name="selector" />
                                 <label for="f-option5">Check payments</label>
                                 <div class="check"></div>
                             </div>
                             <p>
                                 Please send a check to Store Name, Store Street, Store Town,
                                 Store State / County, Store Postcode.
                             </p>
                         </div>
                         <a class="main_btn" id="dv_checkout" href="#">Proceed to Paypal</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--================End Checkout Area =================-->



 <script>
     // show

     const data = <?php echo json_encode($cart)  ?>;

     renderCheckout(data.products,data.total)

     function renderCheckout(data,total){
        const render = document.getElementById("renderCheckout");
        const totalProduct = document.getElementById('totalProduct')
         render.innerHTML = '';
         let li = document.createElement('li');
         li.innerHTML = ` 
            <a href="#">Product
            <span>Total</span>
            </a>`;
         render.appendChild(li); 
         data.forEach(item => {
            let name;
            if(item.name.length > 10){
                name = item.name.slice(0,10) + " ...";
            }else{
                name = item.name;
            }
         let li = document.createElement('li');
            li.innerHTML = `
                <a href="shop/showproduct/${item.idproduct}" title="${item.name}">${name}
                <span class="middle">x ${item.quantity}</span>
                <span class="last">${format(item.totalproduct)} VND</span>
                </a>
            `;
            render.appendChild(li);
         });
         totalProduct.innerHTML = format(total) + " VND";
     }


     (() => {
  
     })();

     //
     const overllay = document.getElementById('dv_overllay_1');
     const btnCheckout = document.getElementById("dv_checkout");
     const form = document.getElementById("formCheckout");

     const regexphone = /^(0)\d{9}$/;
     const regexemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

     btnCheckout.addEventListener("click", (e) => {
         e.preventDefault();
         const formData = new FormData(form);

         const validate = {
             name: name => {
                 if (name == '') return false;
                 return true
             },
             number: number => {
                 if (number == '') return false;
                 return regexphone.test(number)
             },
             email: email => {
                 if (email == '') return false;
                 return regexemail.test(email)
             },
             add1: add1 => {
                 if (add1 == '') return false;
                 return true
             }
         }
         const tb = {
             name: "Vui lòng nhập tên",
             number: "vui lòng nhập số điẹn thoại",
             email: "vui lòng nhập email",
             add1: "vui lòng nhập địa chỉ"
         }
         let sendcheck = true;
         for (let [key, value] of formData) {
             if (validate[key]) {
                 let check = validate[key](value)
                 if (!check) {
                     toast({
                         title: "Warning",
                         message: tb[key],
                         type: "warning"
                     })
                     sendcheck = false;
                     break;
                 }
             }
         }

       if(sendcheck){
        console.log(...formData);
           MyFetchForm("order/addorderpost",formData,data=>{
                console.log(data);
                overllay.classList.add('hidden');
         })
       }
        
     });


     function MyFetchForm(url,formData1,callback){
        const options = {
            method : 'POST',
            body : formData1
        }
        fetch(url,options)
            .then(res => res.json())
            .then(res => {
                load(0);
                callback(res);
            })
            .catch(err=>{
                toast({
                    title : "Error",
                    message : err.message,
                    type : "fail"
                })
                console.log(err)
            })
     }


 </script>