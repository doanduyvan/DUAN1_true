 <!--================Cart Area =================-->
 <section class="cart_area">
   <div class="container">
     <div class="cart_inner">
       <div class="table-responsive">
         <table class="table">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Total</th>
             </tr>
           </thead>

           <style>
             .dv_img_cart {
               width: 100px;
               aspect-ratio: 1/1;
               object-fit: cover;
               border-radius: 10px;
             }

             .dv_1 {
               align-items: center;
               gap: 20px;
             }

             .dvclosep {
               cursor: pointer;
             }

             .cupon_text {
               display: flex;
               justify-content: center;
               gap: 25px;
             }

             .dv_magiamgia {
               margin-top: 20px;
               text-align: center;
               color: green;
             }
           </style>

           <tbody id="showcart">

             <!-- cart -->

             <tr>

               <td>
                 <div class="d-flex dv_1">
                   <div class="dvclosep">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 384 512">
                       <path fill="#d33c3c" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                     </svg>
                   </div>
                   <div class="media">
                     <img class="dv_img_cart" src="public/img/laptop.png" alt="" />
                   </div>
                   <div class="media-body">
                     <p>Minimalistic shop for multipurpose use</p>
                   </div>
                 </div>
               </td>
               <td>
                 <h5>$360.00</h5>
               </td>
               <td>
                 <div class="product_count">
                   <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" />
                   <button onclick="" class="increase items-count" type="button">
                     <i class="lnr lnr-chevron-up"></i>
                   </button>
                   <button onclick="" class="reduced items-count" type="button">
                     <i class="lnr lnr-chevron-down"></i>
                   </button>
                 </div>
               </td>
               <td>
                 <h5>$720.00</h5>
               </td>

             </tr>

             <!-- end cart -->


           </tbody>

           <!-- <tbody>
             <tr class="bottom_button">
               <td></td>
               <td colspan="3">
                 <div class="cupon_text">
                   <input type="text" placeholder="Code Discount" />
                   <a class="main_btn" href="#">Apply</a>
                   <a class="gray_btn" href="#">Close Coupon</a>
                 </div>
                 <div>max giam gia</div>
               </td>
             </tr>

             <tr class="out_button_area">
               <td></td>
               <td></td>
               <td></td>
               <td>
                 <div class="checkout_btn_inner">
                   <a class="gray_btn" href="#">Continue Shopping</a>
                   <a class="main_btn" href="#">Proceed to checkout</a>
                 </div>
               </td>
             </tr>
           </tbody> -->


         </table>
       </div>
     </div>
   </div>
 </section>
 <!--================End Cart Area =================-->


 <script>
   getcart();

   function getcart() {
    const quantityproduct = document.getElementById('quantityproduct');
     let url = "cart/getcartpost";
     myFetch(url, {}, (data) => {
      console.log("data: ", data);
      quantityproduct.innerHTML = data ? data.quantity : 0;
       if (data && data.products.length > 0) {
         rendercart(data.products, data.total);
       } else {
       const showcart = document.getElementById('showcart');
        showcart.innerHTML = 'Chưa thêm sản phẩm vào giỏ hàng';
       }
     });
   }



   function rendercart(data, total) {
    console.log("products: ", data);
     const showcart = document.getElementById('showcart');
     showcart.innerHTML = '';
     data.forEach((item) => {
       let tr = document.createElement('tr');
       tr.innerHTML = `
               <td>
                 <div class="d-flex dv_1">
                   <div class="dvclosep">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 384 512">
                       <path fill="#d33c3c" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                     </svg>
                   </div>
                   <div class="media">
                     <img class="dv_img_cart" src="public/img/imgproducts/${item.img_url}" alt="" />
                   </div>
                   <div class="media-body">
                     <p>${item.name}</p>
                   </div>
                 </div>
               </td>
               <td>
                 <h5>${format(item.price)} VND</h5>
               </td>
               <td>
                 <div class="product_count">
                   <input type="text" name="qty" id="sst" maxlength="12" value="${item.quantity}" title="Quantity:" class="input-text qty" />
                   <button onclick="" class="increase items-count" type="button">
                     <i class="lnr lnr-chevron-up"></i>
                   </button>
                   <button onclick="" class="reduced items-count" type="button">
                     <i class="lnr lnr-chevron-down"></i>
                   </button>
                 </div>
               </td>
               <td>
                 <h5 style="white-space: nowrap;" >${format(item.totalproduct)} VND</h5>
               </td>
            `;
       const input = tr.querySelector('#sst');
       const increase = tr.querySelector('.increase');
       const reduced = tr.querySelector('.reduced');
       const close = tr.querySelector('.dvclosep');
       close.addEventListener('click', async () => {
         $check = await myconfirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
         if ($check) {
           let url = "cart/updatecartpost";
           let data = {
             action: "delete",
             idproduct: item.idproduct
           };
           myFetch(url, data, (data) => {
             if (data.status == 1) {
               getcart();
               toast({
                 title: "Success",
                 message: data.message,
                 type: "success"
               });
             }
           });
         }

       });
       increase.addEventListener('click', () => {
         input.value = parseInt(input.value) + 1;
         let url = "cart/updatecartpost";
          let data = {
            action: "update",
            idproduct: item.idproduct,
            quantity: 1
          };
          myFetch(url, data, (data) => {
            if (data.status == 1) {
              getcart();
              toast({
                title: "Success",
                message: data.message,
                type: "success",
                duration: 1000
              });
            }
          });
       });
       reduced.addEventListener('click', () => {
         if (parseInt(input.value) > 1) {
           input.value = parseInt(input.value) - 1;
           let url = "cart/updatecartpost";
          let data = {
            action: "update",
            idproduct: item.idproduct,
            quantity: -1
          };
          myFetch(url, data, (data) => {
            if (data.status == 1) {
              getcart();
              toast({
                title: "Success",
                message: data.message,
                type: "success",
                duration: 1000
              });
            }
          });
         }
       });

       showcart.appendChild(tr);
     });

    

     let tr = document.createElement('tr');
     tr.classList.add('bottom_button');
     tr.innerHTML = `
        <td></td>
        <td></td>
        <td>
          <h5>Subtotal</h5>
        </td>
        <td>
          <h5 class="oneline">${format(total)} VND</h5>
        </td>
     `;
     showcart.appendChild(tr);

     tr = document.createElement('tr');
     tr.classList.add('bottom_button');
     tr.innerHTML = `
     <td colspan="3">
       <div class="cupon_text">
         <input type="text" placeholder="Code Discount" />
         <a class="main_btn" href="#">Apply</a>
         <a class="gray_btn" href="#">Close Coupon</a>
       </div>
       <div class="dv_magiamgia">max giam gia</div>
     </td>
       <td>
       </td>
     `;
     showcart.appendChild(tr);

     tr = document.createElement('tr');
     tr.classList.add('out_button_area');
     tr.innerHTML = `
              <td></td>
               <td></td>
               <td></td>
               <td>
                 <div class="checkout_btn_inner">
                   <a class="gray_btn" href="shop">Continue Shopping</a>
                   <a class="main_btn" href="shop/checkout">Proceed to checkout</a>
                 </div>
               </td>
      `;
     showcart.appendChild(tr);

   }





   function myFetch(url, data, callback) {
     fetch(url, {
         method: "POST",
         headers: {
           'Content-Type': 'application/json',
         },
         body: JSON.stringify(data)
       }).then(res => res.json())
       .then(data => {
         callback(data);
       })
       .catch(err => {
         load(0);
         toast({
           title: "Error",
           message: err.message,
           type: "fail"
         });
         console.log(err);
       });

   }

 </script>

