<?php

namespace Core;



class Controller{

    private $path_header = null;
    private $path_footer = null;
    private $data_header = [];
    private $data_footer = [];
    private $check = false;

    public function __construct($header = null,$footer = null,$dh = [],$df = [])
    {
        $this->path_header = $header;
        $this->path_footer = $footer;
        $this->data_header = $dh;
        $this->data_footer = $df;

    }



    public function Render($path,$data=[]){
        extract($data);
        if($this->path_header !== null && $this->path_footer !== null){
            $this->check = true;
        }
        if($this->check){
            $header = $this->data_header;
            include_once "./src/mvc/Views/". $this->path_header .".php";
        }
        include_once "./src/mvc/Views/". $path .".php";
        if($this->check){
            $footer = $this->data_footer;
            include_once "./src/mvc/Views/". $this->path_footer .".php";
        }

    }

    protected function Users($dh = [],$df = []){
        $this->path_header = "Users/header_footer/HeaderView";
        $this->path_footer = "Users/header_footer/FooterView";
        $this->data_header = $dh;
        $this->data_footer = $df;
    }

    protected function Admin($dh = [],$df = []){
        $this->path_header = "Admin/header_footer/Header";
        $this->path_footer = "Admin/header_footer/Footer";
        $this->data_header = $dh;
        $this->data_footer = $df;
    }


}