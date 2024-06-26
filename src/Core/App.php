<?php

namespace Core;

class App
{
    private $action = 'index';
    private $params = [];

    function __construct($url)
    {
        $arrUrl = $url;

        if (isset($arrUrl[0]) && $arrUrl[0] == 'API') {
            // code API

        } elseif (isset($arrUrl[0]) && $this->NameUcfirst($arrUrl[0]) == 'Admin') {
             // code Admin
            array_shift($arrUrl);
            if(isset($arrUrl[0])){
                $controller = $this->NameUcfirst($arrUrl[0]);
            }else{
                $controller = "Dashboard";
            }
           
            if(!Session::checkAdmin()){
                $controller = "Auth";
                $this->action = "signin";
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $this->action = "signinpost";
                }
            }
            
            $nameSpace = "AdminControllers\\" . $controller . "ControllerAdmin";
            $this->Run($nameSpace, $arrUrl);
        } elseif (isset($arrUrl[0])) {
            // code User
            $nameSpace = "Controllers\\" . $this->NameUcfirst($arrUrl[0]) . "Controller";
            $this->Run($nameSpace, $arrUrl);
        } else {
            // go home
            $nameSpace = "Controllers\\HomeController";
            $this->Run($nameSpace,[]);
        }
    }


    private function NameUcfirst($name)
    {
        return ucfirst(strtolower($name));
    }

    private function getParams($arrUrl)
    {
        $respon = [];
        if (isset($arrUrl[2])) {
            unset($arrUrl[0]);
            unset($arrUrl[1]);
            foreach ($arrUrl as $item) {
                $temp = strtolower($item);
                array_push($respon, $temp);
            }
        }
        $this->params = $respon;
    }

    private function Run($nameSpace, $arrUrl)
    {
        $temp = $arrUrl[1] ?? $this->action;
        $action = strtolower($temp);
        $this->getParams($arrUrl);
        $checkAction = method_exists($nameSpace, $action);
        if (class_exists($nameSpace) && $checkAction) {
            call_user_func_array([new $nameSpace, $action], $this->params);
        }else{
            echo "Lỗi chưa xác định, khi chưa đăng nhập vào admin mà truyền action vào url";
        }
    }
}
