<?php

namespace Models;

class BrandModel extends BaseModel{
    private $table = "brands";

    function __construct()
    {
        parent::__construct();
    }

    // get

    function getallbrand(){
        return $this->getall($this->table);
    }

    function getbyidbrand($id){
        return $this->getbyid($this->table,$id);
    }

    //add

    function addbrand($name){
        $data['name'] = $name;
        $data['created_at'] = NOW;
        return $this->addrow($this->table,$data);
    }

    // update

    function updatebrand($id,$name){
        $data['name'] = $name;
        return $this->editrow($this->table,$id,$data);
    }

    // delete

    function delbrand($id){
        return $this->delrow($this->table,$id);
    }
}