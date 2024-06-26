<?php

namespace Core;

class Request
{

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function isGet()
    {
        if ($this->getMethod() === 'get') {
            return true;
        }
        return false;
    }
    public function isPost()
    {
        if ($this->getMethod() === 'post') {
            return true;
        }
        return false;
    }



    public function getDataMethod($type = null)
    {
        $dataMethod = [];
        if ($type == null || $type == "GET") :
            if ($this->isGet()) {
                if (!empty($_GET)) {
                    foreach ($_GET as $key => $value) {
                        if ($key !== 'url') {
                            $dataMethod[$key] = $value;
                        }
                    }
                }
            }
        endif;
        if ($type == null || $type == "POST") :
            if ($this->isPost()) {
                if (!empty($_POST)) {
                    foreach ($_POST as $key => $value) {
                        $dataMethod[$key] = $value;
                    }
                }
            }
        endif;

        return $dataMethod;
    }
}
