<?php

define("DIR_ROOT", ROOT);
$web_root = $_SERVER["HTTP_HOST"];
$arrPath = explode('\\', DIR_ROOT);

$indexPath = array_search("htdocs",$arrPath);
$arrPath = array_slice($arrPath,$indexPath+1);

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$web_root .= '/' . implode("/",$arrPath) . "/" ;

define("WEB_ROOT", $web_root);






