<?php

namespace Models;

class ProductsModel extends BaseModel
{
    private $table = "products";
    private $imgdetails = "product_image";
    private $pathImg = "public/img/imgproducts/";
    function __construct()
    {
        parent::__construct();
    }

    // get

    function getallproduct()
    {
        return $this->getall($this->table);
    }

    function getbyidproduct($id)
    {   
        $this->updateviews($id);
        return $this->getbyid($this->table, $id);
    }

    function getimgdetails($id)
    {
        $sql = "SELECT * FROM $this->imgdetails WHERE product_id = $id";
        $result = $this->query($sql);
        $data = [];
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $data;
    }

    //add

    function addproduct($data, $img, $img_details)
    {

        $isnum = ["price", "price_sale", "stock_quantity", "productcategory_id", "brands_id"];
        $data['created_at'] = NOW;

        if (!empty($img['name'])) {
            $randomfour = rand(1000, 9999);
            $img['name'] = "P" . $randomfour . $img['name'];
            $data['img_url'] = $img['name'];
            $this->moveFile($img['name'], $img['tmp_name'], $this->pathImg);
        }
        $this->addrow($this->table, $data, $isnum);
        $id = $this->lastInsertId();
        $this->addimgdetail($id, $img_details);
        return true;
    }

    function addimgdetail($id, $img_details)
    {
        foreach ($img_details['name'] as $key => $value) {
            $randomfour = rand(1000, 9999);
            $value = "P" . $randomfour . $value;
            $data = [
                'product_id' => $id,
                'img_url' => $value
            ];
            $this->moveFile($value, $img_details['tmp_name'][$key], $this->pathImg);
            $this->addrow($this->imgdetails, $data);
        }
    }

    // update

    function updateproduct($data, $img, $img_details, $id)
    {
        $isnum = ["price", "price_sale", "stock_quantity", "productcategory_id", "brands_id"];

        if (!empty($img['name'])) {
            $randomfour = rand(1000, 9999);
            $img['name'] = "P" . $randomfour . $img['name'];
            $data['img_url'] = $img['name'];
            $this->moveFile($img['name'], $img['tmp_name'], $this->pathImg);
        }

        if (!empty($img_details['name'][0])) {
            $this->addimgdetail($id, $img_details);
        }

        return $this->editrow($this->table, $id, $data, $isnum);
    }

    function updateviews($id){
        $product = $this->getbyid($this->table,$id);
        if(!empty($product)){
            $oldview = $product['views'];
            $sql = "UPDATE $this->table SET views = ".($oldview + 1)." WHERE id = $id";
            return $this->query($sql);
        }
    }

    // delete

    function delproduct($id, $imgUrl = null)
    {
        try {
            $sql = "SELECT * FROM $this->imgdetails WHERE product_id = $id";
            $result = $this->query($sql);
            $data = [];
            if ($result->rowCount() > 0) {
                $data = $result->fetchAll(\PDO::FETCH_ASSOC);
            }

            foreach ($data as $item) {
                if(empty($item['img_url'])) continue;
                $filepath = $this->pathImg . $item['img_url'];
                if (file_exists($filepath)) {
                    unlink($filepath);
                }
            }

            if ($imgUrl) {
                if (file_exists($this->pathImg . $imgUrl)) {
                    unlink($this->pathImg . $imgUrl);
                }
            }

            return $this->delrow($this->table, $id);
            
        } catch (\Exception $e) {
            $respon['local'] = "dòng 107 trong ProductsModel.php";
            $respon['status'] = 0;
            $respon['message'] = $e->getMessage();
            echo json_encode($respon);
            die;
        }
    }

    function delimgdetails($arrid)
    {

        foreach ($arrid as $id) {
            $sql = "SELECT * FROM $this->imgdetails WHERE id = $id";
            $result = $this->query($sql);
            $data = [];
            if ($result->rowCount() > 0) {
                $data = $result->fetch(\PDO::FETCH_ASSOC);
            }
            if (file_exists($this->pathImg . $data['img_url'])) {
                unlink($this->pathImg . $data['img_url']);
            }
            $this->delrow($this->imgdetails, $id);
        }
        return true;
    }
}
