<?php
require 'commun_services.php';

if (
    !isset($_REQUEST['idOrder']) || !isset($_REQUEST['idUser'])
    || !isset($_REQUEST['idProduct'])
    || !isset($_REQUEST['quantity']) || !isset($_REQUEST['price'])
) {
    produceErrorRequest();
    return;
}

if (
    empty($_REQUEST['idOrder']) || empty($_REQUEST['idUser'])
    || empty($_REQUEST['idProduct'])
    || empty($_REQUEST['quantity']) || empty($_REQUEST['price'])
) {
    produceErrorRequest();
    return;
}

try {
    $order = new OrdersEntity();
    $order->setIdOrder($_REQUEST['idOrder']);
    $order->setIdUser($_REQUEST['idUser']);
    $order->setIdProduct($_REQUEST['idProduct']);
    $order->setQuantity($_REQUEST['quantity']);
    $order->setPrice($_REQUEST['price']);
    $data = $db->updateOrders($order);

    if ($data) {
        produceResult("Mise à jour réussie !");
    } else {
        produceError("Echec de la mise à jour. ");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}

// 20210226124111
// http://localhost/ecommpao/backend/api/updateOrders.php?idOrder=14&idUser=55&idProduct=37&quantity=2602&price=2502

// {
//     "status": 200,
//     "result": "Mise à jour réussie !",
//     "args": {
//       "idOrder": "14",
//       "idUser": "55",
//       "idProduct": "37",
//       "quantity": "2602",
//       "price": "2502"
//     },
//     "time": "26/02/2021 12:41:10"
//   }