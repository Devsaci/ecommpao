<?php
require 'commun_services.php';

if (
    !isset($_REQUEST['idUser']) || !isset($_REQUEST['idProduct'])
    || !isset($_REQUEST['quantity']) || !isset($_REQUEST['price'])
) {
    produceErrorRequest();
    return;
}

if (
    empty($_REQUEST['idUser']) || empty($_REQUEST['idProduct'])
    || empty($_REQUEST['quantity']) || empty($_REQUEST['price'])
) {
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

    if ($result) {

        produceResult("Commande créée avec succès");
    } else {
        produceError("Erreur lors de la création de la commande. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}
// 20210226123642
// http://localhost/ecommpao/backend/api/createOrders.php?idUser=55&idProduct=37&quantity=2602&price=2602

// {
//     "status": 200,
//     "result": "Commande créée avec succès",
//     "args": {
//       "idUser": "55",
//       "idProduct": "37",
//       "quantity": "2602",
//       "price": "2602"
//     },
//     "time": "26/02/2021 12:36:42"
//   }