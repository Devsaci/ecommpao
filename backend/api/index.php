<?php
// var_dump($_SERVER);
// var_dump($_SERVER["REQUEST_URI"]);
$url = trim($_SERVER["REQUEST_URI"],'/');
$url_clean = explode("/",$url);
// 
if (sizeof($url_clean) < 4) {
    header("Location: ../index.php");
    exit();
} else {
    $action = $url_clean[sizeof($url_clean)-1];
    $pos = strpos($action,'?');




}
