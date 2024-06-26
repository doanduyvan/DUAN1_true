<?php

namespace Controllers;

use Core\Session;
use Models\ProductsModel;

class CartController
{
    private $productModel;

    function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function addcartpost(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $user = Session::get('account');
            if(!$user){
                $datarespon = [
                    "status" => 0,
                    "message" => "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng"
                ];
                echo json_encode($datarespon);
                return;
            }else{
                $datasquest = json_decode(file_get_contents("php://input"),true);
                $idproduct = $datasquest['idproduct'];
                $iduser = $user['id'];
                $quantity = $datasquest['quantity'];
                $product = $this->productModel->getbyidproduct($idproduct);
                $price = $product['price_sale'];
                $name = $product['product_name'];
                $img = $product['img_url'];
                Session::setcart($iduser,$idproduct,$name,$img,$quantity,$price);
                $quantityproduct = Session::get('cart')['quantity'];
                $datarespon = [
                    "status" => 1,
                    "message" => "Thêm sản phẩm vào giỏ hàng thành công",
                    "quantityproduct" => $quantityproduct
                ];
                echo json_encode($datarespon);
                return;
            }
        }
    }

    function getcartpost(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $cart = Session::get('cart');
            if(!$cart){
                $datarespon = null;
                echo json_encode($datarespon);
            }else{
                echo json_encode($cart);
            }
        }
    }

    function updatecartpost(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $dataresquest = json_decode(file_get_contents("php://input"),true);
            $action = $dataresquest['action'];
            $idproduct = $dataresquest['idproduct'];

            switch($action){
                case "delete":
                    $cart = Session::get('cart');
                    foreach($cart['products'] as $key => $value){
                        if($value['idproduct'] == $idproduct){
                            unset($cart['products'][$key]);
                        }
                    }
                    $cart['products'] = array_values($cart['products']);
                    $datarespon['status'] = 1;
                    $datarespon['message'] = "Xóa sản phẩm khỏi giỏ hàng thành công";
                    Session::set('cart',$cart);
                    Session::reloadcart();
                    echo json_encode($datarespon);
                    break;
                case "update":
                    $quantity = $dataresquest['quantity'];
                    $user = Session::get('account');
                    $iduser = $user['id'];
                    $product = $this->productModel->getbyidproduct($idproduct);
                    $price = $product['price_sale'];
                    $name = $product['product_name'];
                    $img = $product['img_url'];
                    Session::setcart($iduser,$idproduct,$name,$img,$quantity,$price);
                    $datarespon['status'] = 1;
                    $datarespon['message'] = "Cập nhật giỏ hàng thành công";
                    echo json_encode($datarespon);
                    break;
            }
        }
    
    }

    function showcartpost(){
        $data = ['ok' => "ok ket noi thanh cong posst ma khong can khai router"];
        echo json_encode($data);
    }

}