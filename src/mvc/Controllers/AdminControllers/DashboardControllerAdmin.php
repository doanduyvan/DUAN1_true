<?php

namespace AdminControllers;

use Core\Controller;

class DashboardControllerAdmin extends Controller{
    private $data = [];
    function __construct()
    {
        $this->data['currentMenu'] = 1;
        parent::Admin();
    }

    function index(){
        $this->Render("Admin/dashboard/DashboardView",$this->data);
    }

}