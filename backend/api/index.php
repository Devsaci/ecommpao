<?php
// var_dump($_SERVER);
// var_dump($_SERVER["REQUEST_URI"]);
$url = trim($_SERVER["REQUEST_URI"],'/');
$url_clean = explode("/",$url);
var_dump($url_clean);