<?php


namespace Controllers;
use Core\Controller;
use Models\UsersModel;
use Core\Session;

class AuthController extends Controller
{
    private $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        // parent::Users();
    }

    public function signin()
    {
        $this->Render("Users/login/SigninView");
    }

    public function signup()
    {
        $this->Render("Users/login/SignupView");
    }

    public function signout()
    {
        Session::destroy();
        header("Location: ". WEB_ROOT);
    }

    public function testsendmail(){
        echo 'hi send mail';
        $mail = new \Core\Mail();
        $mail->testmail();
        $mail->sendTo("vandd0311@gmail.com","DuyVan0311");

        $content = "
        <h1>Test mail thử tiếng việt</h1>
        <p>Đây là mail test</p>
        <h1 style='color: red;'>mật khẩu của bạn là 123456</h1>
        ";

        $mail->setContent("subject Nhận mật khẩu php2",$content);
        $mail->send();
    }

    // post

    public function signinpost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = $this->UsersModel->checklogin($email,$password,0);
            if($data){
                $datarspon['status'] = 1;
                $datarspon['message'] = "Đăng nhập thành công";
                Session::setAccount($data['id'],$data['fullname'],$data['email'],0);
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Tài khoản hoặc mật khẩu không đúng";
            }
            echo json_encode($datarspon);
        }
    }

    public function adduserpost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $role = 0;

            $data['roles'] = $role;
            $data['fullname'] = $_POST['fullname'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['created_at'] = NOW;

            try{
                $check = $this->UsersModel->addusermodel($data);
            if($check){
                $lastid = $this->UsersModel->lastInsertId();
                Session::setAccount($lastid,$data['fullname'],$data['email'],$role);
                $datarspon['status'] = 1;
                $datarspon['message'] = "Đăng ký thành công";
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Đăng ký thất bại";
            }
            }catch(\Exception $e){
                $check = false;
                $datarspon['status'] = 0;
                $datarspon['message'] = "Email đã tồn tại!";
            }
            echo json_encode($datarspon);
        }
    }

    public function setcodepost(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $email = $_POST['email'];
            $data = $this->UsersModel->checkAccount($email);
            if($data){
                $code = rand(1000,9999);
                $setcode['code'] = $code;
                $setcode['id'] = $data['id'];
                Session::set("codein4",$setcode);
                $content = file_get_contents(WEB_ROOT . "src/mvc/Views/mail/SendCode.html");
                $content = str_replace("{{code}}",$code,$content);
                // gửi mail
                $mail = new \Core\Mail();
                $mail->sendTo($email,"DuyVan0311");
                $mail->setContent("Confirm Code",$content);
                $mail->send();
                $datarspon['status'] = 1;
                $datarspon['message'] = "Đã gửi mã xác nhận";
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Tài khoản không tồn tại";
            }
            echo json_encode($datarspon);
        }
    }

    function checkcodepost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(Session::get("codein4")){
                $codein4 = Session::get("codein4");
                $codeserver = $codein4['code'];
            }else{
                $codeserver = null;
            }
            $code = $_POST['comfirmcode'];
            if($codeserver && $code == $codeserver){
                $datarspon['status'] = 1;
                $datarspon['message'] = "Mã xác nhận đúng";
                $datarspon['code'] = $code;
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Mã xác nhận không đúng";
            }
            echo json_encode($datarspon);
        }
    }

    public function changepasspost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $codeserver = Session::get("codein4")['code'] ?? null;
            $iduser = Session::get("codein4")['id'] ?? null;
            $code = $_POST['confirmcode'];
            $psss = $_POST['password'];

            if($codeserver && $iduser && $code == $codeserver){
                Session::remove("codein4");
                $check = $this->UsersModel->changePassword($iduser,$psss);
                if($check){
                    $datarspon['status'] = 1;
                    $datarspon['message'] = "Đổi mật khẩu thành công";
                }else{
                    $datarspon['status'] = 0;
                    $datarspon['message'] = "Đổi mật khẩu thất bại";
                }
            }else{
                $datarspon['status'] = 0;
                $datarspon['message'] = "Mã xác nhận không đúng, Vui lòng thử lại!";
            }

            echo json_encode($datarspon);
        }
    }

}