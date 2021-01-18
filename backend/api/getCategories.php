<?php 
require 'commun_services.php';

try {
    $categories = $db->getProduct();
    if ($categories) {
        produceResult(clearDataArray($categories));
    }else {
        produceError("Problème de Récupération des catégories");
    }
} catch (Exception $th) {
    produceError("Echec de Récupération des catégories");
}