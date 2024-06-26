<style>
  #ol1 img {
    max-width: 60px;
    aspect-ratio: 1/1;
    object-fit: cover;
  }

  #carousel1 img {
    max-width: 540px;
    aspect-ratio: 3/4;
    object-fit: cover;
  }

  #price {
    display: flex;
    gap: 20px;
  }

  #price>h2:last-child {
    text-decoration: line-through;
    color: gray;
    font-size: 20px;
  }

  #home img {
    width: 100%;
    object-fit: cover;
  }
</style>

<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Product Details</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="index.html">Home</a>
          <a href="single-product.html">Product Details</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="s_product_img">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" id="ol1">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-s-2.jpg" alt="" />
              </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1">
                <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-s-3.jpg" alt="" />
              </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2">
                <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-s-4.jpg" alt="" />
              </li>
            </ol>

            <div class="carousel-inner" id="carousel1">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-1.jpg" alt="First slide" />
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-1.jpg" alt="Second slide" />
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= WEB_ROOT ?>public/lib/img/product/single-product/s-product-1.jpg" alt="Third slide" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3 id="nameProduct"><?= $product['product_name'] ?></h3>
          <div id="price">
            <h2>$149.99</h2>
            <h2>200000</h2>
          </div>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Category</span> : <?= $category['name'] ?></a>
            </li>
            <li>
              <p href="#"> <span>Availibility</span> : <?= $product['stock_quantity'] ?></p>
            </li>
          </ul>
          <p>
            <?= $product['des_short'] ?>
          </p>
          <div class="product_count">
            <label for="qty">Quantity:</label>
            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" />
            <button onclick="changequantity(1)" class="increase items-count" type="button">
              <i class="lnr lnr-chevron-up"></i>
            </button>
            <button onclick="changequantity(-1)" class="reduced items-count" type="button">
              <i class="lnr lnr-chevron-down"></i>
            </button>
          </div>
          <div class="card_area">
            <a class="main_btn" href="#" onclick="return addcart()">Add to Cart</a>
            <a class="icon_btn" href="#">
              <i class="lnr lnr lnr-diamond"></i>
            </a>
            <a class="icon_btn" href="#">
              <i class="lnr lnr lnr-heart"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <?= $product['des'] ?>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5>128mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5>508mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5>85mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5>52gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Quality checking</h5>
                </td>
                <td>
                  <h5>yes</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Freshness Duration</h5>
                </td>
                <td>
                  <h5>03days</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>When packeting</h5>
                </td>
                <td>
                  <h5>Without touch of hand</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Each Box contains</h5>
                </td>
                <td>
                  <h5>60pcs</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="comment_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item reply">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-2.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-3.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Post a comment</h4>
              <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn submit_btn">
                    Submit Now
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>Overall</h5>
                  <h4>4.0</h4>
                  <h6>(03 Reviews)</h6>
                </div>
              </div>
              <div class="col-6">
                <div class="rating_list">
                  <h3>Based on 3 Reviews</h3>
                  <ul class="list">
                    <li>
                      <a href="#">5 Star
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">4 Star
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">3 Star
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">2 Star
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                    <li>
                      <a href="#">1 Star
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="review_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-2.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="<?= WEB_ROOT ?>public/lib/img/product/single-product/review-3.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Add a Review</h4>
              <p>Your Rating:</p>
              <ul class="list">
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
              </ul>
              <p>Outstanding</p>
              <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn submit_btn">
                    Submit Now
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Product Description Area =================-->



<script>
  const product = <?= json_encode($product) ?>;
  const imgdetails = <?= json_encode($imgdetails) ?>;
  console.log(product);

  const price = document.getElementById('price');
  price.innerHTML = `
        <h2>${format(product.price_sale)}đ</h2>
        <h2>${format(product.price)}đ</h2>
      `;

  renderimgdetail(imgdetails);

  function renderimgdetail($data) {
    const ol1 = document.getElementById('ol1');
    ol1.innerHTML = '';
    $data.forEach((item, index) => {
      const li = document.createElement('li');
      li.setAttribute('data-target', '#carouselExampleIndicators');
      li.setAttribute('data-slide-to', index);
      if (index == 0) {
        li.classList.add('active');
      }
      li.innerHTML = `
               <img src="public/img/imgproducts/${item.img_url}" alt="" />
          `;
      ol1.appendChild(li);
    });

    const carousel1 = document.getElementById('carousel1');
    carousel1.innerHTML = '';
    $data.forEach((item, index) => {
      const div = document.createElement('div');
      div.classList.add('carousel-item');
      if (index == 0) {
        div.classList.add('active');
      }
      div.innerHTML = `
               <img
                      class="d-block w-100"
                      src="public/img/imgproducts/${item.img_url}"
                      alt=""
                    />
          `;
      carousel1.appendChild(div);

    });
  }

  function changequantity(num) {
    const qty = document.getElementById('sst');
    if (num == 1) {
      qty.value++;
    } else {
      if (qty.value > 1) {
        qty.value--;
      }
    }
  }


  function addcart() {
    const qty = document.getElementById('sst');
    console.log(qty.value);
    let data = {
      idproduct: product.id,
      quantity: qty.value
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
    return false;
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