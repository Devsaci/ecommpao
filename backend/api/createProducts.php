<?php 
require 'commun_services.php';
if(!isset($_REQUEST['name']) || !isset($_REQUEST['description']) || !isset($_REQUEST['price']) ||
!isset($_REQUEST['stock']) || !isset($_REQUEST['category']) || !isset($_REQUEST['image'])){
    produceErrorRequest();
    return;
}
if(empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['price']) ||
empty($_REQUEST['stock']) || empty($_REQUEST['category']) || empty($_REQUEST['image'])){
    produceErrorRequest();
    return;
}

try {
    $product = new ProductEntity();
   

} catch (Exception  $th) {
    produceError($th->getMessage());
}