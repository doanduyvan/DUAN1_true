<?php

namespace AdminControllers;
use Core\Controller;
use Core\Session;
use Models\UsersModel;

class AuthControllerAdmin extends Controller{
    private $UsersModel;

    public function __construct()
    {
        if(Session::checkAdmin()){
            header("Location: ". WEB_ROOT . "admin");
        }
        $this->UsersModel = new UsersModel();
    }

    function signin(){
        $this->Render("Admin/login/SigninView");
    }

    function signout(){
        Session::destroy();
        header("Location: ". WEB_ROOT . "admin");
    }
    
       // post

       public function signinpost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            

            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = $this->UsersModel->checklogin($email,$password,1);
            if(!$data){
            $data = $this->UsersModel->checklogin($email,$password,2);
            }

            if($data){
                $datarspon['status'] = 1;
                $datarspon['message'] = "Đăng nhập thành công";
                Session::setAccount($data['id'],$data['fullname'],$data['email'],$data['roles']);
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Tài khoản hoặc mật khẩu không đúng";
            }
            echo json_encode($datarspon);
        }
    }

}

?>