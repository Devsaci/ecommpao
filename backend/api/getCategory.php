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

// 20210226103137
// http://localhost/ecommpao/backend/api/getCategory.php

// {
//   "status": 200,
//   "result": [
//     {
//       "idCategory": 1,
//       "name": "categorie test0"
//     },
//     {
//       "idCategory": 2,
//       "name": "Robes femmes"
//     },
//     {
//       "idCategory": 3,
//       "name": "Pantalons femmes"
//     },
//     {
//       "idCategory": 4,
//       "name": "Chemises femmes"
//     },
//     {
//       "idCategory": 5,
//       "name": "Bon plan femmes"
//     },
//     {
//       "idCategory": 6,
//       "name": "categorie test1"
//     },
//     {
//       "idCategory": 7,
//       "name": "APICategorie27/02"
//     }
//   ],
//   "args": [
    
//   ],
//   "time": "26/02/2021 10:31:36"
// }

