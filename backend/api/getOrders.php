<?php 
require 'commun_services.php';

try {
    $orders= $db->getOrders();
    if ($orders ) {
        produceResult(clearDataArray($orders));
    }else {
        produceError("Problème de Récupération des products ");
    }
} catch (Exception $th) {
    produceError("Echec de Récupération des products");
}
// 20210226124234
// http://localhost/ecommpao/backend/api/getOrders.php

// {
//     "status": 200,
//     "result": [
//       {
//         "idOrder": 1,
//         "idUser": 11,
//         "idProduct": 29,
//         "quantity": 1,
//         "price": 56.99,
//         "createdAd": "2020-04-24 21:38:30"
//       },
//       {
//         "idOrder": 2,
//         "idUser": 11,
//         "idProduct": 15,
//         "quantity": 1,
//         "price": 29.99,
//         "createdAd": "2020-04-24 21:38:30"
//       },
//       {
//         "idOrder": 3,
//         "idUser": 11,
//         "idProduct": 5,
//         "quantity": 1,
//         "price": 23.89,
//         "createdAd": "2020-04-24 21:41:33"
//       },
//       {
//         "idOrder": 4,
//         "idUser": 11,
//         "idProduct": 36,
//         "quantity": 1,
//         "price": 788.99,
//         "createdAd": "2020-04-24 21:41:33"
//       },
//       {
//         "idOrder": 5,
//         "idUser": 11,
//         "idProduct": 1,
//         "quantity": 1,
//         "price": 78.98,
//         "createdAd": "2020-04-24 22:27:11"
//       },
//       {
//         "idOrder": 6,
//         "idUser": 11,
//         "idProduct": 1,
//         "quantity": 1,
//         "price": 78.98,
//         "createdAd": "2020-04-24 22:27:12"
//       },
//       {
//         "idOrder": 7,
//         "idUser": 24,
//         "idProduct": 2,
//         "quantity": 1,
//         "price": 78.98,
//         "createdAd": "2020-04-25 12:17:07"
//       },
//       {
//         "idOrder": 8,
//         "idUser": 24,
//         "idProduct": 35,
//         "quantity": 1,
//         "price": 666.99,
//         "createdAd": "2020-04-25 12:18:04"
//       },
//       {
//         "idOrder": 9,
//         "idUser": 11,
//         "idProduct": 4,
//         "quantity": 1,
//         "price": 23.98,
//         "createdAd": "2020-05-25 03:24:44"
//       },
//       {
//         "idOrder": 10,
//         "idUser": 11,
//         "idProduct": 4,
//         "quantity": 1,
//         "price": 23.98,
//         "createdAd": "2020-05-25 03:24:44"
//       },
//       {
//         "idOrder": 11,
//         "idUser": 11,
//         "idProduct": 30,
//         "quantity": 50,
//         "price": 200,
//         "createdAd": "2021-02-01 12:14:44"
//       },
//       {
//         "idOrder": 12,
//         "idUser": 11,
//         "idProduct": 30,
//         "quantity": 50,
//         "price": 200,
//         "createdAd": "2021-02-01 12:15:54"
//       },
//       {
//         "idOrder": 13,
//         "idUser": 11,
//         "idProduct": 30,
//         "quantity": 50,
//         "price": 200,
//         "createdAd": "2021-02-01 12:16:22"
//       },
//       {
//         "idOrder": 14,
//         "idUser": 55,
//         "idProduct": 37,
//         "quantity": 2602,
//         "price": 2502,
//         "createdAd": "2021-02-26 12:36:42"
//       }
//     ],
//     "args": [
      
//     ],
//     "time": "26/02/2021 12:42:33"
//   }