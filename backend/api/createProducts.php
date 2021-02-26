<?php
require 'commun_services.php';
if (
    !isset($_REQUEST['name']) || !isset($_REQUEST['description']) || !isset($_REQUEST['price']) ||
    !isset($_REQUEST['stock']) || !isset($_REQUEST['category']) || !isset($_REQUEST['image'])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['price']) ||
    empty($_REQUEST['stock']) || empty($_REQUEST['category']) || empty($_REQUEST['image'])
) {
    produceErrorRequest();
    return;
}


try {
    $product = new ProductEntity();
    $product->setName($_REQUEST['name']);
    $product->setDescription($_REQUEST['description']);
    $product->setPrice($_REQUEST['price']);
    $product->setStock($_REQUEST['stock']);
    $product->setCategory($_REQUEST['category']);
    $product->setImage($_REQUEST['image']);

    $data = $db->createProduct($product);

    if ($data) {
        produceResult("Produit enrégistré avec succès !");
    } else {
        produceError("Problème rencontré lors de l'enregistrement");
    }
} catch (Exception  $th) {
    produceError($th->getMessage());
}

// 20210226130121
// http://localhost/ecommpao/backend/api/createProducts.php?name=Produit26/02fordelete&description=descrip26/02&price=2602&category=1&image=bg26/02.png&stock=2602

// {
//     "status": 200,
//     "result": "Produit enrégistré avec succès !",
//     "args": {
//       "name": "Produit26/02fordelete",
//       "description": "descrip26/02",
//       "price": "2602",
//       "category": "1",
//       "image": "bg26/02.png",
//       "stock": "2602"
//     },
//     "time": "26/02/2021 13:01:21"
//   }