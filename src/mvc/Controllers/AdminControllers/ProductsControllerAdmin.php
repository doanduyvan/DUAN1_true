<?php

namespace AdminControllers;
use Core\Controller;
use Models\ProductsModel;
use Models\BrandModel;
use Models\CategoryModel;
class ProductsControllerAdmin extends Controller
{
    private $data = [];
    private $productModel;
    private $brandModel;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = new ProductsModel();
        $this->brandModel = new BrandModel();
        $this->categoryModel = new CategoryModel();
        $this->data['currentMenu'] = 4;
        parent::Admin();
    }

    public function index()
    {
        $this->data['products'] = $this->productModel->getallproduct();
        $this->Render('Admin/products/ShowProductView', $this->data);
    }

    public function add()
    {
        $this->data['brands'] = $this->brandModel->getallbrand();
        $this->data['category'] = $this->categoryModel->getallcategory();
        $this->Render('Admin/products/AddProductView', $this->data);
    }

    public function edit($id)
    {
        if(!$id || !is_numeric($id)){
            header("Location:".WEB_ROOT."admin/products");
        }
        $this->data['brands'] = $this->brandModel->getallbrand();
        $this->data['category'] = $this->categoryModel->getallcategory();
        $this->data['product'] = $this->productModel->getbyidproduct($id);
        $this->data['imgdetails'] = $this->productModel->getimgdetails($id);
        $this->Render('Admin/products/EditProductView', $this->data);
    }

    // post

    public function addpost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // $data['img_url'] = $_POST[''];
            // $data['created_at'] = $_POST[''];

            $data['product_name'] = $_POST['productName'];
            $data['des_short'] = $_POST['sDes'];
            $data['des'] = $_POST['lDes'];
            $data['price'] = $_POST['priceOrigin'];
            $data['price_sale'] = $_POST['priceSale'];
            $data['stock_quantity'] = $_POST['stocks'];
            $data['productcategory_id'] = $_POST['category'];
            $data['brands_id'] = $_POST['brand'];
            $data['statusproduct'] = $_POST['status'];
            $img = $_FILES['img'];
            $img_details = $_FILES['img_details'];
            $check = $this->productModel->addproduct($data,$img,$img_details);

            if($check){
                $respon['status'] = 1;
            }else{
                $respon['status'] = 0;
            }
            echo json_encode($respon);
        }
    }

    public function updatepost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $arrdelimg = $_POST['img_details_delete'] ?? null;
            if($arrdelimg){
                $this->productModel->delimgdetails($arrdelimg);
            }
            $id = $_POST['id'];

            $data['product_name'] = $_POST['productName'];
            $data['des_short'] = $_POST['sDes'];
            $data['des'] = $_POST['lDes'];
            $data['price'] = $_POST['priceOrigin'];
            $data['price_sale'] = $_POST['priceSale'];
            $data['stock_quantity'] = $_POST['stocks'];
            $data['productcategory_id'] = $_POST['category'];
            $data['brands_id'] = $_POST['brand'];
            $data['statusproduct'] = $_POST['status'];
            $img = $_FILES['img'];
            $imgdetails = $_FILES['img_details'];
            $check = $this->productModel->updateproduct($data,$img,$imgdetails,$id);

            // $test['des'] = $_POST['lDes'];

            if($check){
                $respon['status'] = 1;
            }else{
                $respon['status'] = 0;
            }
            echo json_encode($respon);
        }
    }

    function delpost(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $dataresquest = json_decode(file_get_contents('php://input'), true);
            $id = $dataresquest["id"];
            $imgUrl = empty($dataresquest["imgUrl"]) ? null : $dataresquest["imgUrl"];

            $check = $this->productModel->delproduct($id,$imgUrl);
            // $check = true;
            
            if($check){
                $respon['status'] = 1;
            }else{
                $respon['status'] = 0;
            }
          echo json_encode($respon);
        }else{
            header("Location:".WEB_ROOT."404.html");
        }
    }

}