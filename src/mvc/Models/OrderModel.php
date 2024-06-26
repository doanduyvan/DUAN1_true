<?php

namespace Models;

use Core\Session;

class OrderModel extends BaseModel
{

    private $table = "orders";
    private $tabledetail = "order_detail";

    function __construct()
    {
        parent::__construct();
    }


    public function status()
    {
        return [
            "0" => "Chờ sử lý",
            "1" => "Đã xác nhận đơn hàng",
            "2" => "Đang giao hàng",
            "3" => "Đã giao hành thành công",
            "4" => "Đơn hàng đã bị hủy"
        ];
    }

    // get

    public function getallorder()
    {

            $sql = "select o.id as idorder, o.stutus as statusorder, o.total_price as totalorder, o.shipping_address as addressorder, o.created_at as createorder, o.fullname as nameorder, o.phone as phoneorder, o.email as emailorder, o.notes as noteorder, o.payments , u.id as iduser, u.fullname as nameuser , od.id as iddetail, od.price, od.quantity,od.total,p.product_name,p.img_url from orders o
            inner join order_detail od on o.id = od.order_id
            inner join products p on p.id = od.product_id 
            inner join users u on o.users_id = u.id order by o.id desc;";
        $result = $this->query($sql);
        $data1 = [];
        if ($result->rowCount() > 0) {
            $data1 = $result->fetchAll(\PDO::FETCH_ASSOC);
        }


        $orders = [];
        foreach ($data1 as $row) {
            $orderId = $row['idorder'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'order_id' => $orderId,
                    'status' => $row['statusorder'],
                    'total_price' => $row['totalorder'],
                    'shipping_address' => $row['addressorder'],
                    'created_at' => $row['createorder'],
                    'nameorder' => $row['nameorder'],
                    'phoneorder' => $row['phoneorder'],
                    'emailorder' => $row['emailorder'],
                    'noteorder' => $row['noteorder'],
                    'payments' => $row['payments'],
                    'iduser' => $row['iduser'],
                    'nameuser' => $row['nameuser'],
                    'details' => []
                ];
            }
            $orders[$orderId]['details'][] = [
                'price' => $row['price'],
                'total' => $row['total'],
                'quantity' => $row['quantity'],
                'product_name' => $row['product_name'],
                'img_url' => $row['img_url']
            ];
        }
        return $orders;
    }


    public function getallorderbyid($id)
    {

        $sql = "select o.* , od.price, od.quantity,od.total,p.product_name,p.img_url from orders o
        inner join order_detail od on o.id = od.order_id
        inner join products p on p.id = od.product_id where o.users_id = $id order by o.id desc";
        $result = $this->query($sql);
        $data1 = [];
        if ($result->rowCount() > 0) {
            $data1 = $result->fetchAll(\PDO::FETCH_ASSOC);
        }


        $orders = [];
        foreach ($data1 as $row) {
            $orderId = $row['id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'order_id' => $orderId,
                    'status' => $this->status()[$row['stutus']],
                    'idstatus' => $row['stutus'],
                    'total_price' => $row['total_price'],
                    'shipping_address' => $row['shipping_address'],
                    'created_at' => $row['created_at'],
                    'fullname' => $row['fullname'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                    'notes' => $row['notes'],
                    'payments' => $row['payments'],
                    'details' => []
                ];
            }
            $orders[$orderId]['details'][] = [
                'price' => $row['price'],
                'total' => $row['total'],
                'quantity' => $row['quantity'],
                'product_name' => $row['product_name'],
                'img_url' => $row['img_url']
            ];
        }
        return $orders;
    }


    function addordermodel($data)
    {

        $cart = Session::get('cart');

        $data['created_at'] = NOW;
        $data['users_id'] = $cart['iduser'];
        $data['total_price']  = $cart['total'];

        $isnum = ['users_id', 'stutus', 'total_price', 'payments'];
        $checkadd = $this->addrow($this->table, $data, $isnum);
        if ($checkadd) {
            $idorder = $this->lastInsertId();
            $products = $cart['products'];
            foreach ($products as $product) {
                $this->addorderdetailmodel($idorder, $product['idproduct'], $product['quantity'], $product['price'], $product['totalproduct']);
            }
            Session::remove('cart');
            return true;
        } else {
            return false;
        }
    }

    function addorderdetailmodel($idorder, $idproduct, $quantity, $price, $total)
    {
        $data['order_id'] = $idorder;
        $data['product_id'] = $idproduct;
        $data['quantity'] = $quantity;
        $data['price'] = $price;
        $data['total'] = $total;

        $isnum = ['order_id', 'product_id', 'quantity', 'price', 'total'];
        return $this->addrow($this->tabledetail, $data, $isnum);
    }

    // update

    public function updatestatus($idorder, $status)
    {
        $sql = "UPDATE $this->table SET stutus = $status WHERE id = $idorder";
        return $this->query($sql);
    }
}
