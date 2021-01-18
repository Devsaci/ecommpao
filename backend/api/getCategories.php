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
    produceError("Echec de Récupération des catégories");
}




/* 
http://localhost/ecommpao/backend/api/getCategories.php
=>
{
  "status": 200,
  "result": [
    {
      "idCategory": 1,
      "name": "Talons femmes"
    },
    {
      "idCategory": 2,
      "name": "Robes femmes"
    },
    {
      "idCategory": 3,
      "name": "Pantalons femmes"
    },
    {
      "idCategory": 4,
      "name": "Chemises femmes"
    },
    {
      "idCategory": 5,
      "name": "Bon plan femmes"
    }
  ],
  "args": [
    
  ],
  "time": "18/01/2021 16:53:38"
} */
?>

