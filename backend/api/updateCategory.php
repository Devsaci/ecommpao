<?php 
require 'commun_services.php';

if(!isset($_REQUEST['id']) || !isset($_REQUEST['name'])){
    produceErrorRequest();
    return;
}

if(empty($_REQUEST['id']) || empty($_REQUEST['name'])){
    produceErrorRequest();
    return;
}


$category = new CategoryEntity();
$category->setIdCategory($_REQUEST['id']);
$category->setName($_REQUEST['name']); 

try {

    $data = $db->updateCategory($category);

    if($data){
        produceResult('modification réussie ;');
    }else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }

} catch (Exception $th) {
    produceError($th->getMessage());

}

// 20210120173323
// http://localhost/ecommpao/backend/api/updateCategory.php?id=1&name=Talons%20femmes

// {
//     "status": 200,
//     "result": "modification réussie ;",
//     "args": {
//       "id": "1",
//       "name": "Talons femmes"
//     },
//     "time": "20/01/2021 17:33:23"
//   }