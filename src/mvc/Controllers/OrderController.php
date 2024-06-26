<?php

namespace Controllers;

use Core\Controller;
use Core\Session;
use Models\OrderModel;

class OrderController extends Controller
{
    private $orderModel;
    private $data = [];
    public function __construct()
    {
        $this->orderModel = new OrderModel();
        parent::Users();
    }

    public function index()
    {
        $user = Session::get("account");
        if(!$user){
            header("Location:". WEB_ROOT);
        }
        $iduser = $user['id'];
        $this->data['orders'] = $this->orderModel->getallorderbyid($iduser);
        $this->Render("Users/orders/OrderView", $this->data);
    }

    // post


    public function addorderpost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['fullname'] = $_POST['name'];
            $data['phone'] = $_POST['number'];
            $data['email'] = $_POST['email'];
            $data['shipping_address'] = $_POST['add1'];
            $data['notes'] = $_POST['message'];
            $data['stutus'] = 0;
            $data['payments'] = 0;

            
            $check = $this->orderModel->addordermodel($data);
            if($check){
                $res['status'] = 1;
            }else{
                $res['status'] = 0;
            }
                echo json_encode($res);
        }
    }

    public function updatestatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datareq = json_decode(file_get_contents("php://input"), true);
            $idorder =  $datareq['idorder'];
            $status = 4;
            $this->orderModel->updatestatus($idorder, $status);
            echo json_encode(['status' => 1]);
        }
    }
}
