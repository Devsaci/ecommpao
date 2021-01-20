<?php
require 'commun_services.php';

if(!isset($_REQUEST["id"]) || !is_numeric($_REQUEST["id"])){
    produceErrorRequest();
    return;
}

$category = new CategoryEntity();
$category->setIdCategory($_REQUEST["id"]);

try {
    $data = $db->deleteCategory($category);

    if($data){
        produceResult('Suppression réussie ;');
    }else {
        produceError("Echec de la suppression. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}
// 20210120192240
// http://localhost/ecommpao/backend/api/deleteCategory.php?id=6

// {
//     "status": 200,
//     "result": "Suppression réussie ;",
//     "args": {
//       "id": "6"
//     },
//     "time": "20/01/2021 19:22:40"
//   }