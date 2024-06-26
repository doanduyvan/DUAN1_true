<?php

namespace Models;

use Config\Database;
use Config\DatabaseConf;
use PDO;

class BaseModel{
    private $conn = null;
    function __construct()
    {
        $dbIn4 = DatabaseConf::getDatabase();
        $host = $dbIn4["host"];
        $dbname = $dbIn4["dbname"];
        $username = $dbIn4["username"];
        $password = $dbIn4["password"];

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $_SESSION["error"] = "Có lỗi liên quan đến cơ sở dữ liệu <br>" . $e->getMessage();
            header("Location:". WEB_ROOT ."404.html");
        }
    }

    // lấy id vừa insert

    function lastInsertId(){
        return $this->conn->lastInsertId();
    }

    // query chung chung

    function query($sql){
            return $this->conn->query($sql);
    }

    // select

    function getall($table){
        $sql = "SELECT * FROM $table";
        $result = $this->query($sql);
        $data = [];
        if($result->rowCount() > 0){
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    function getbyid($table,$id){
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $this->query($sql);
        $data = [];
        if($result->rowCount() > 0){
            $data = $result->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    // insert
    function addrow($table,$data,$rowisnum = []){
        $keys = implode(',',array_keys($data));
        $values = implode(',',array_values(array_map(function($key,$value) use ($rowisnum){
            return in_array($key,$rowisnum) ? ($value === '' ? 0 : $value)  :  "'".$value."'";
        },array_keys($data),$data)));
        $sql = "INSERT INTO $table($keys) VALUES ($values)";
        // return $sql;
        if($this->query($sql)){
            return true;
        }
        return false;
    }


    // update

    function editrow($table,$id,$data,$rowisnum = []){
        $array_values = array_map(function($key,$value) use ($rowisnum) {
            $value_tmp = in_array($key,$rowisnum) ? $value : "'".$value."'" ;
            return $key .'='. $value_tmp ;
        },array_keys($data),$data);
        $values = implode(',',$array_values);
        $sql = "UPDATE $table SET $values WHERE id = $id";
        
        if($this->query($sql)){
            return true;
        }
        return false;
    }

    // delete

    function delrow($table,$id){
        $sql = "DELETE FROM $table WHERE id = $id";
        if($this->query($sql)){
            return true;
        }
        return false;
    }

    // move file

    function moveFile($fileName,$fileTmp,$path){
        $upload = $path . "/" . $fileName;
        if(file_exists($upload)){
            return true;
        }
        move_uploaded_file($fileTmp,$upload);
        return true;
    }

}