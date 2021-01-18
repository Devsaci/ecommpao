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
?>