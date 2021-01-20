<?php
require 'commun_services.php';

if(!isset($_REQUEST["idProduct"]) || !isset($_REQUEST["name"]) || !isset($_REQUEST["description"]) || !isset($_REQUEST["price"])
|| !isset($_REQUEST["stock"]) || !isset($_REQUEST["category"]) || !isset($_REQUEST["image"])){
    produceErrorRequest();
    return;
}
if(empty($_REQUEST["idProduct"]) || empty($_REQUEST["name"]) || empty($_REQUEST["description"]) || empty($_REQUEST["price"])
|| empty($_REQUEST["stock"]) || empty($_REQUEST["category"]) || empty($_REQUEST["image"])){
    produceErrorRequest();
    return;
}

$product = new ProductEntity();
$product->setIdProduct($_REQUEST["idProduct"]);
$product->setName($_REQUEST['name']);
$product->setDescription($_REQUEST['description']);
$product->setPrice($_REQUEST['price']);
$product->setStock($_REQUEST['stock']);
$product->setCategory($_REQUEST['category']);
$product->setImage($_REQUEST['image']);

try {
    $data = $db->updateProduct($product);

    if($data){
        produceResult('modification réussie ;');
    }else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}
// 20210120190154
// http://localhost/ecommpao/backend/api/updateProducts.php?idProduct=39&name=nameProduct&description=descriptionproduct&price=999&stock=999&category=1&image=imageproduct.png

// {
//     "status": 200,
//     "result": "modification réussie ;",
//     "args": {
//       "idProduct": "40",
//       "name": "nameProduct",
//       "description": "descriptionproduct",
//       "price": "999",
//       "stock": "999",
//       "category": "1",
//       "image": "imageproduct.png"
//     },
//     "time": "20/01/2021 19:10:47"
//   }