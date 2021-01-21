<?php
require 'commun_services.php';

if(!isset($_REQUEST["id"]) || !is_numeric($_REQUEST["id"])){
    produceErrorRequest();
    return;
}

$user = new UserEntity();
$user->setIdUser($_REQUEST["id"]);


try {
    $data = $db->deleteUsers($user);

    if($data){
        produceResult('Suppression réussie ;');
    }else {
        produceError("Echec de la suppression. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}


// 20210121110931
// http://localhost/ecommpao/backend/api/deleteUsers.php?id=67
