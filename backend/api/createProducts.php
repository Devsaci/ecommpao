<?php 
require 'commun_services.php';
if(!isset($_REQUEST['name']) || !isset($_REQUEST['description']) || !isset($_REQUEST['price']) ||
!isset($_REQUEST['stock']) || !isset($_REQUEST['category']) || !isset($_REQUEST['image'])){
    produceErrorRequest();
    return;
}