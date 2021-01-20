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
    $order->setIdUser($_REQUEST['idUser']);
    $order->setIdProduct($_REQUEST['idProduct']);
    $order->setQuantity($_REQUEST['quantity']);
    $order->setPrice($_REQUEST['price']);

    $result = $db->createOrders($order);

    if($result){
       
        produceResult("Commande créée avec succès");
    }else {
        produceError("Erreur lors de la création de la commande. Merci de réessayer !");
    }

} catch (Exception $th) {
    produceError($th->getMessage());
}

// 20210120102129
// http://localhost/ecommpao/backend/api/createOrders.php

// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": [
      
//     ],
//     "time": "20/01/2021 10:21:29"
//   }

// http://localhost/ecommpao/backend/api/createOrders.php?idUser=5

// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": {
//       "idUser": "5"
//     },
//     "time": "20/01/2021 10:23:13"
//   }

// 20210120114742
// http://localhost/ecommpao/backend/api/createOrders.php?idUser=5&idProduct=11&quantity=5&price=1000

// {
//     "status": 200,
//     "result": "Commande créée avec succès",
//     "args": {
//       "idUser": "5",
//       "idProduct": "11",
//       "quantity": "5",
//       "price": "1000"
//     },
//     "time": "20/01/2021 11:47:41"
//   }