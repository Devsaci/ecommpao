<?php 
require 'commun_services.php';

try {
    $products = $db->getProduct();
    if ($products ) {
        produceResult(clearDataArray($products));
    }else {
        produceError("Problème de Récupération des products ");
    }
} catch (Exception $th) {
    produceError("Echec de Récupération des products");
}

// 20210226130219
// http://localhost/ecommpao/backend/api/getProducts.php

// {
//     "status": 200,
//     "result": [
//       {
//         "idProduct": 1,
//         "name": "talons hauts",
//         "description": "SARAIRIS 2020 mode été plate-forme talons hauts compensés décontracté confortable lumière loisirs chaussures femme sandales femmes chaussures femme",
//         "price": 78.98,
//         "stock": 200,
//         "Category": "1",
//         "image": "b4.png",
//         "createdAt": "2020-04-16 00:00:00"
//       }
//       ....... 
//       {
//         "idProduct": 38,
//         "name": "Produit26/02",
//         "description": "descrip26/02",
//         "price": 2602,
//         "stock": 2602,
//         "Category": "1",
//         "image": "bg26/02.png",
//         "createdAt": "2021-02-26 13:00:26"
//       },
//       {
//         "idProduct": 39,
//         "name": "Produit26/02fordelete",
//         "description": "descrip26/02",
//         "price": 2602,
//         "stock": 2602,
//         "Category": "1",
//         "image": "bg26/02.png",
//         "createdAt": "2021-02-26 13:01:21"
//       }
//     ],
//     "args": [
      
//     ],
//     "time": "26/02/2021 13:02:18"
//   }