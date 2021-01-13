<?php 
require 'commun_services.php';
try {
    $categories = $db->getCategory();
    if ($categories) {
        produceResult(clearDataArray($categories));
    }else {
        produceError("Problème de Récupération des catégories");
    }
} catch (Exception $th) {
    produceError($th->getMessage())
}