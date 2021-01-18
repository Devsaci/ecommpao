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