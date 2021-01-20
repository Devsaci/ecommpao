<?php 
require 'commun_services.php';

if(!isset($_REQUEST['id']) || !isset($_REQUEST['name'])){
    produceErrorRequest();
    return;
}

if(empty($_REQUEST['id']) || empty($_REQUEST['name'])){
    produceErrorRequest();
    return;
}

try {
    //code...
} catch (Exception $th) {
    produceError($th->getMessage());

