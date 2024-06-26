<?php

namespace AdminControllers;

use Core\Controller;
use Core\Request;
use Models\CategoryModel;


class CategoryControllerAdmin extends Controller{
    private $categoryModel;
    private $data = [];
    private $request;
    function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->data["currentMenu"] = 2;
        $this->request = new Request();
        parent::Admin();
    }

    function index(){
        $this->data["fulldata"] = $this->categoryModel->getallcategory();
        $this->Render("Admin/category/ShowCategoryView",$this->data);
    }

    function add(){      
        $this->Render("Admin/category/AddCategoryView",$this->data);
    }

    function edit($id = null){
        if(!$id || !is_numeric($id)){
            header("Location:".WEB_ROOT."admin/category");
        }
        $this->data["category"] = $this->categoryModel->getbyidcategory($id);
        $this->Render("Admin/category/EditCategoryView",$this->data);
    }

    // post api

    function updatepost(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $respon = [];
            $id = $_POST["id"];
            $name = $_POST["categoryName"];
            $check = $this->categoryModel->updatecategory($id,$name);
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

    function addpost(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $respon = [];
            $name = $_POST["categoryName"];
            $check = $this->categoryModel->add($name);
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

    function delpost(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $dataresquest = json_decode(file_get_contents('php://input'), true);
            $id = $dataresquest["id"];
            $check = $this->categoryModel->delcategory($id);
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