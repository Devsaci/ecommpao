<?php 
require 'commun_services.php';

if(!isset($_REQUEST['idUser']) || !isset($_REQUEST['idProduct']) 
|| !isset($_REQUEST['quantity']) || !isset($_REQUEST['price'])){
    produceErrorRequest();
    return;
}

if(empty($_REQUEST['idUser']) || empty($_REQUEST['idProduct']) 
|| empty($_REQUEST['quantity']) || empty($_REQUEST['price'])){
    produceErrorRequest();
    return;
}

try {
    $order = new OrdersEntity();


    
} catch (Exception $th) {
    produceError($th->getMessage());
}
