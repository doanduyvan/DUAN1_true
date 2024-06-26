<?php


namespace Config;

class Routers{

    public static function getRouters(){
        return [
            "auth"  => ["signin","signout","signup","adduserpost","signinpost","setcodepost","checkcodepost","changepasspost"],
            "home"  => ["index"],
            "shop" => ["index","showproduct","cart","checkout","addtocartpost"],
            "cart" => ["addcartpost"],
            "blog" => ["index"],
            "order" => ["index"],
            "contact" => ["index"],
            ];
        }

    public static function getAdminRouters(){
        return [
            "auth" => ["signin","signout","signinpost"],
            "dashboard" => ["index"],
            "category" => ["index","add","edit","addpost","updatepost","delpost"],
            "brand" => ["index","add","edit","addpost","updatepost","delpost"],
            "products" => ["index","add","edit","addpost","updatepost","delpost"],
            "order" => ["index"]
            ];
        }
}

?>