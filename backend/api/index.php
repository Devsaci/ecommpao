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
    $temp = explode("?",$action);
    $action = $temp[0];

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        require './get'.ucwords($action).".php";
    }elseif($_SERVER["REQUEST_METHOD"] === "POST"){
        require './create'.ucwords($action).".php";
    }elseif($_SERVER["REQUEST_METHOD"] === "DELETE"){
        echo"delete";
    }elseif($_SERVER["REQUEST_METHOD"] === "PUT"){
        echo"update";
    }




}
// var_dump($action);