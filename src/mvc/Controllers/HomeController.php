<?php

namespace Controllers;

use Core\Controller;

class HomeController extends Controller{

    private $productsModel = null;
    private $data = [];
    function __construct()
    {
        $this->data['Menu'] = 1;
       $this->productsModel = new \Models\ProductsModel();
       parent::Users();
    }



    function index(){
        
        $this->data['products'] = $this->productsModel->getallproduct();

        $this->Render("Users/home/HomeView",$this->data);

    }

    function testhome($param1,$param2 = null){
        echo "test home";

        echo "<br>" . $param1;

        echo "<br>" . $param2;
    }

}