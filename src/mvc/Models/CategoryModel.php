<?php

namespace Models;

class CategoryModel extends BaseModel{

    private $table = "productcategory";

    function __construct()
    {
        parent::__construct();
    }

    // get

    function getallcategory(){
        return $this->getall($this->table);
    }

    function getbyidcategory($id){
        return $this->getbyid($this->table,$id);
    }

    //add

    function add($name){
        $data['name'] = $name;
        $data['created_at'] = NOW;
        return $this->addrow($this->table,$data);
    }

    // update

    function updatecategory($id,$name){
        $data['name'] = $name;
        return $this->editrow($this->table,$id,$data);
    }

    // delete

    function delcategory($id){
        return $this->delrow($this->table,$id);
    }

}


?>