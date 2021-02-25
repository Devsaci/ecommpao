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

// 20210120120701
// http://localhost/ecommpao/backend/api/createProducts.php

// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": [
      
//     ],
//     "time": "20/01/2021 12:07:01"
//   }

// 20210120121217
// http://localhost/ecommpao/backend/api/createProducts.php?name=Produit%202021&description=descrip2021&price=1000&category=1&image=bgtest.png&stock=1000

// {
//     "status": 200,
//     "result": "Produit enrégistré avec succès !",
//     "args": {
//       "name": "Produit 2021",
//       "description": "descrip2021",
//       "price": "1000",
//       "category": "1",
//       "image": "bgtest.png",
//       "stock": "1000"
//     },
//     "time": "20/01/2021 12:12:17"
//   }