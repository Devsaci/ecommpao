<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["idProduct"]) 
    || !isset($_REQUEST["name"]) 
    || !isset($_REQUEST["description"]) 
    || !isset($_REQUEST["price"])
    || !isset($_REQUEST["stock"]) 
    || !isset($_REQUEST["category"]) 
    || !isset($_REQUEST["image"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["idProduct"]) 
    || empty($_REQUEST["name"]) 
    || empty($_REQUEST["description"]) 
    || empty($_REQUEST["price"])
    || empty($_REQUEST["stock"]) 
    || empty($_REQUEST["category"]) 
    || empty($_REQUEST["image"])
) {
    produceErrorRequest();
    return;
}



try {
    $product = new ProductEntity();
    $product->setIdProduct($_REQUEST["idProduct"]);
    $product->setName($_REQUEST['name']);
    $product->setDescription($_REQUEST['description']);
    $product->setPrice($_REQUEST['price']);
    $product->setStock($_REQUEST['stock']);
    $product->setCategory($_REQUEST['category']);
    $product->setImage($_REQUEST['image']);
    $data = $db->updateProduct($product);

    if ($data) {
        produceResult('modification réussie ;');
    } else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}
// 20210225123643
// http://localhost/ecommpao/backend/api/updateProducts.php?idProduct=44&name=26/02t&description=26/02&price=1&stock=1&category=1&image=26/02.png

// {
//     "status": 200,
//     "result": "modification réussie ;",
//     "args": {
//       "idProduct": "44",
//       "name": "26/02t",
//       "description": "26/02",
//       "price": "1",
//       "stock": "1",
//       "category": "1",
//       "image": "26/02.png"
//     },
//     "time": "25/02/2021 12:36:43"
//   }