<?php
// var_dump($_SERVER);
// var_dump($_SERVER["REQUEST_URI"]);
$url = explode("/",$_SERVER["REQUEST_URI"]);
var_dump($url);