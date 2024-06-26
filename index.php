<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDateTime = date('Y-m-d H:i:s');
define("NOW",$currentDateTime);
define("ROOT",__DIR__);
require_once "./vendor/autoload.php";

// new App\Core\App();
new Core\Router();





?>