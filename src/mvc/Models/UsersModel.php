<?php

namespace Models;

class UsersModel extends BaseModel
{
    private $table = "users";

    public function __construct()
    {
        parent::__construct();
    }

    public function addusermodel($data){

      return $this->addrow($this->table,$data,['roles']);

    }

    public function checklogin($email,$password,$role){
        $sql = "SELECT * FROM $this->table WHERE email = '$email' AND password = '$password' AND roles = $role";
        $result = $this->query($sql);
        $data = false;
        if($result->rowCount() > 0){
            $data = $result->fetch();
        }
        return $data;
    }
  
    public function checkAccount($email){
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $result = $this->query($sql);
        $data = false;
        if($result->rowCount() > 0){
            $data = $result->fetch();
        }
        return $data;
    }

    public function changePassword($idemail,$password){
        $sql = "UPDATE $this->table SET password = '$password' WHERE id = $idemail";
        return $this->query($sql);
    }

}
?>