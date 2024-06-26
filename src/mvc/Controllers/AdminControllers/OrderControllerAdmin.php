<?php

namespace AdminControllers;

use Core\Controller;

use Models\OrderModel;

class OrderControllerAdmin extends Controller{

    private $orderModel;
    private $data = [];
    public function __construct()
    {
        $this->data['currentMenu'] = 5;
        $this->orderModel = new OrderModel();
        parent::Admin();
    }

    public function index()
    {
        $this->data['status'] = $this->orderModel->status();
        $this->data['orders'] = $this->orderModel->getallorder();
        $this->Render("Admin/order/OrderViewAdmin", $this->data);
    }

    // post

    public function updatestatus()
    {
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datareq = json_decode(file_get_contents("php://input"),true);
           $idorder = $datareq['idorder'];
           $status = $datareq['status'];
           $this->orderModel->updatestatus($idorder,$status);
           echo json_encode(['status' => 1]);
       }
    }
}