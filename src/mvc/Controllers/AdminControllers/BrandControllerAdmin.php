<?php

namespace AdminControllers;

use Core\Controller;
use Models\BrandModel;

class BrandControllerAdmin extends Controller
{
    private $data = [];
    private $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
        $this->data['currentMenu'] = 3;
        parent::Admin();
    }


    public function index()
    {
        $this->data['brands'] = $this->brandModel->getallbrand();
        $this->Render('Admin/brand/ShowBrandView', $this->data);
    }

    public function add()
    {
        $this->Render('Admin/brand/AddBrandView', $this->data);
    }

    function edit($id = null){
        if(!$id || !is_numeric($id)){
            header("Location:".WEB_ROOT."admin/brand");
        }
        $this->data["category"] = $this->brandModel->getbyidbrand($id);
        $this->Render("Admin/brand/EditBrandView",$this->data);
    }


    // post api

    function addpost()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $respon = [];
            $name = $_POST["brandName"];
            $check = $this->brandModel->addbrand($name);
            if ($check) {
                $respon['status'] = 1;
            } else {
                $respon['status'] = 0;
            }
            echo json_encode($respon);
        } else {
            header("Location:" . WEB_ROOT . "404.html");
        }
    }

    function updatepost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $respon = [];
            $id = $_POST["id"];
            $name = $_POST["brandName"];
            $check = $this->brandModel->updatebrand($id, $name);
            if ($check) {
                $respon['status'] = 1;
            } else {
                $respon['status'] = 0;
            }
            echo json_encode($respon);
        } else {
            header("Location:" . WEB_ROOT . "404.html");
        }
    }

    function delpost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataresquest = json_decode(file_get_contents('php://input'), true);
            $id = $dataresquest["id"];
            $check = $this->brandModel->delbrand($id);
            if ($check) {
                $respon['status'] = 1;
            } else {
                $respon['status'] = 0;
            }
            echo json_encode($respon);
        } else {
            header("Location:" . WEB_ROOT . "404.html");
        }
    }
}
