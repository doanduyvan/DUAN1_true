<?php

namespace Controllers;
use Core\Controller;
class ContactController extends Controller{
    private $data = [];
    public function __construct()
    {
        $this->data['Menu'] = 5;
        parent::Users();
    }

    public function index(){
        $this->Render("Users/contact/ContactView",$this->data);
    }
}