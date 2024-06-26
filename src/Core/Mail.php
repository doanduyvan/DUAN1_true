<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail{

    private $mail = null;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'duyvanlee2001@gmail.com';
        $this->mail->Password = 'qhxicysdkzlhcvsw';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->Encoding = 'base64';
        $this->mail->setFrom("duyvanlee2001@gmail.com","Đoàn Duy Vấn OK");
    }

    public function sendTo($mail,$name){
        $this->mail->addAddress($mail,$name);
    }

    public function setContent($subject,$body){
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AltBody = "Máy bạn cùi quá không hỗ trợ HTML vứt mẹ máy đi";
    }

    public function send(){
        // $this->mail->send();
        try {
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function testmail(){
        echo "test mail";
    }
}

?>