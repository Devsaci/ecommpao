<?php
// var_dump($_SERVER["REQUEST_URI"]);
$url = trim($_SERVER["REQUEST_URI"],'/');
$url_clean = explode("/", $url);
// var_dump($url_clean);

if(sizeof($url_clean) < 4){
    header("Location: ../index.php");
    exit();
}else{
    $action = $url_clean[sizeof($url_clean)-1];
    $pos = strpos($action,'?');
    if($pos){
        $temp = explode("?",$action);
        $action = $temp[0];
    }
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        echo "recuperation";
    }elseif($_SERVER["REQUEST_METHOD"] === "POST"){
        echo "creat";
    }elseif($_SERVER["REQUEST_METHOD"] === "DELETE"){
        echo "delete";
    }elseif($_SERVER["REQUEST_METHOD"] === "PUT"){
        echo "update";
    }


}
// Installation Application Postman

// var_dump($action);
// echo"test url ok";