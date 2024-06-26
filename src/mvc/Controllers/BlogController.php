<?php

namespace Controllers;

use Core\Controller;

class BlogController extends Controller{
    private $data = [];
    public function __construct()
    {
        $this->data['Menu'] = 3;
        parent::Users();
    }

    public function index(){
        $this->Render("Users/blog/BlogView",$this->data);
    }
}