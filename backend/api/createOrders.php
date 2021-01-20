<?php 
require 'commun_services.php';

if(!isset($_REQUEST['idUser']) || !isset($_REQUEST['idProduct']) 
|| !isset($_REQUEST['quantity']) || !isset($_REQUEST['price'])){
    produceErrorRequest();
    return;
}