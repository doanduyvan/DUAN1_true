<style>
  .dv_img {
    max-width: 255px;
    aspect-ratio: 1/1;
    object-fit: cover;
  }

  .dv_agination {
    /* background-color: red; */
    /* border: 1px solid #ccc; */
    padding: 10px 0;
    display: grid;
    place-items: center;
  }
</style>

<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Shop Category</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="index.html">Home</a>
          <a href="category.html">Shop</a>
          <a href="category.html">Women Fashion</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting" id="sortproducts">
              <option value="0">Default sorting</option>
              <option value="1">Price small to large</option>
              <option value="2">Price large to small</option>
            </select>
            <select class="show" id="limitpage">
              <option value="3">Show 3</option>
              <option selected value="6">Show 6</option>
              <option value="9">Show 9</option>
            </select>
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row" id="ProductElement">

            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="card-img" src="<?= WEB_ROOT ?>public/lib/img/product/inspired-product/i1.jpg" alt="" />
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="<?= WEB_ROOT ?>shop/showproduct" class="d-block">
                    <h4>Latest men’s sneaker1</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>



            <!-- end product -->
          </div>
          <!-- phan trang -->
          <div class="dv_agination">
            <ul class="pagination ul" id="paginationlist">
              <!-- <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Category</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list" id="categorylist">
                <li>
                  <a href="#">Frozen Fish</a>
                </li>
                <li>
                  <a href="#">Dried Fish</a>
                </li>
                <li>
                  <a href="#">Fresh Fish</a>
                </li>
                <li>
                  <a href="#">Meat Alternatives</a>
                </li>
                <li>
                  <a href="#">Fresh Fish</a>
                </li>
                <li>
                  <a href="#">Meat Alternatives</a>
                </li>
                <li>
                  <a href="#">Meat</a>
                </li>
              </ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Product Brand</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list" id="brandlist">
                <li>
                  <a href="#">Apple</a>
                </li>
                <li>
                  <a href="#">Asus</a>
                </li>
                <li class="active">
                  <a href="#">Gionee</a>
                </li>
                <li>
                  <a href="#">Micromax</a>
                </li>
                <li>
                  <a href="#">Samsung</a>
                </li>
              </ul>
            </div>
          </aside>

        
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Category Product Area =================-->


<script>
  const quantityproduct = document.getElementById("quantityproduct");

  // data all
  const products = <?= json_encode($products) ?>;
  const category = <?= json_encode($category) ?>;
  const brands = <?= json_encode($brands) ?>;

  // handle



  // sử lí phân trang, vừa lọc theo danh mục, vừa lọc theo thương hiệu

  let page = 1;
  let limit = 6;
  let totalpage = 0;
  let Fcategory = null;
  let Fbrand = null;
  let Fsort = null;

  start();
  function start() {
    let Fproducts = filterProducts(products, Fcategory, Fbrand, Fsort);
    totalpage = Math.ceil(Fproducts.length / limit);
    pricesort();
    litmitpage();
    rendercategory(category);
    renderbrand(brands);
    renderpagination(totalpage);
    let start = (page - 1) * limit;
    let end = page * limit;
    Fproducts = Fproducts.slice(start, end);
    renderproducts(Fproducts);
  }

  function filterProducts(products, category = null, brand = null, sort = null) {
    let Ptemp = products.filter(product => {
      const matchCategory = category ? product.productcategory_id === category : true;
      const matchBrand = brand ? product.brands_id === brand : true;
      return matchCategory && matchBrand;
    });
    if(sort){
      if(sort == 1){
        return Ptemp.sort((a,b) => a.price_sale - b.price_sale);
      }else if(sort == 2){
        return Ptemp.sort((a,b) => b.price_sale - a.price_sale);
      }
    }else{
      return Ptemp;
    }
  }

  // limit page

  function litmitpage() {
    const limitpage = document.getElementById("limitpage");
    limitpage.onchange = function() {
      limit = parseInt(limitpage.value);
      page = 1;
      start();
    }
  }


  // price sort

  function pricesort(){
    const sortproducts = document.getElementById("sortproducts");
    sortproducts.onchange = function(){
      const value = sortproducts.value;
      if(value == 1){
        Fsort = 1;
      }else if(value == 2){
        Fsort = 2;
      }else{
        Fsort = null;
      }
      start();
    }
  }

  // render pagination

  function renderpagination(totalpage) {
    let paginationlist = document.getElementById("paginationlist");
    paginationlist.innerHTML = "";
    console.log(totalpage);
    if(totalpage <= 1) return;
    let startP = page == 1 ? 1 : (page == totalpage ? (page - 2 <= 1 ? 1 : page - 2) : page - 1);
    let endP = startP == 1 ? (startP + 2 >= totalpage ? totalpage : startP + 2) : (page + 1 >= totalpage ? totalpage : page + 1);
    console.log("start: ",startP,"end: ", endP);
    for (let i = startP; i <= endP; i++) {
      const li = document.createElement("li");
      li.classList.add("page-item");
      if (i == page) {
        li.classList.add("active");
      }
      li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
      paginationlist.appendChild(li);
      li.onclick = function(e) {
        e.preventDefault();
        page = i;
        start();
      };
    }
  }

  // render category


  function rendercategory(data) {
    const categorylist = document.getElementById("categorylist");
    categorylist.innerHTML = "";
    const li = document.createElement("li");
    if(Fcategory == null) li.classList.add("active");
    li.innerHTML = `<a href="#" onclick="return false">All</a>`;
    li.onclick = function(e) {
      e.preventDefault();
      Fcategory = null;
      page = 1;
      start();
    };
    categorylist.appendChild(li);
    data.forEach(item => {
      const li = document.createElement("li");
      if(Fcategory == item.id) li.classList.add("active");
      li.innerHTML = `<a href="#" onclick="return false">${item.name}</a>`;
      categorylist.appendChild(li);
      li.onclick = function(e) {
        e.preventDefault();
        Fcategory = item.id;
        page = 1;
        // console.log(Fcategory)
        start();
      };
    });
  }

  // render brand

  function renderbrand(data) {
    const brandlist = document.getElementById("brandlist");
    brandlist.innerHTML = "";
    const li = document.createElement("li");
    if(Fbrand == null) li.classList.add("active");
    li.onclick = function(e) {
      e.preventDefault();
      Fbrand = null;
      page = 1;
      start();
    };
    li.innerHTML = `<a href="#" onclick="return false">All</a>`;
    brandlist.appendChild(li);
    data.forEach(item => {
      const li = document.createElement("li");
      if(Fbrand == item.id) li.classList.add("active");
      li.onclick = function(e) {
        e.preventDefault();
        Fbrand = item.id;
        page = 1;
        start();
      };
      li.innerHTML = `<a href="#">${item.name}</a>`;
      brandlist.appendChild(li);
    });
  }

  // render product

  function renderproducts(data) {
    const ProductElement = document.getElementById("ProductElement");
    ProductElement.innerHTML = "";
    data.forEach(item => {

      const div = document.createElement("div");
      div.classList.add("col-lg-4", "col-md-6");
      div.innerHTML = `
                <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img dv_img"
                        src="public/img/imgproducts/${item.img_url}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#" class="addcart">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="shop/showproduct/${item.id}" class="d-block">
                        <h4>${item.product_name}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">${format(item.price_sale)}đ</span>
                        <del>${format(item.price)}đ</del>
                      </div>
                    </div>
                  </div>
        `;
      ProductElement.appendChild(div);

      div.onclick = function(e) {
        if (e.target.closest(".addcart")) {
          e.preventDefault();
          console.log("addcart", item.id);
          let data = {
            idproduct: item.id,
            quantity: 1
          };
          const url = "cart/addcartpost";

          myFetch(url, data, function(data) {
            console.log(data);
            if (data.status == 1) {
              toast({
                title: "success",
                message: data.message,
                type: "success"
              });
              quantityproduct.innerHTML = data.quantityproduct;
            } else {
              toast({
                title: "Warning",
                message: data.message,
                type: "warning"
              });
            }

          });

        }

      }

    });
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