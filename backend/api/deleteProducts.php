<?php
require 'commun_services.php';

if (!isset($_REQUEST["id"]) || !is_numeric($_REQUEST["id"])) {
    produceErrorRequest();
    return;
}

try {
    $product = new ProductEntity();
    $product->setIdProduct($_REQUEST["id"]);
    $data = $db->deleteProduct($product);

    if ($data) {
        produceResult('Suppression réussie ;');
    } else {
        produceError("Echec de la suppression. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}
// 20210226132316
// http://localhost/ecommpao/backend/api/deleteProducts.php?id=39

// {
//     "status": 200,
//     "result": "Suppression réussie ;",
//     "args": {
//       "id": "39"
//     },
//     "time": "26/02/2021 13:23:15"
//   }