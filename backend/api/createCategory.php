<?php
require 'commun_services.php';


if (!isset($_REQUEST['name']) || empty($_REQUEST['name'])) {
  produceErrorRequest();
  return;
}


try {
  $category = new CategoryEntity();
  $category->setName($_REQUEST['name']);

  $result = $db->createCategory($category);


  if ($result) {
    produceResult("Categorie créée avec succès");
  } else {
    produceError("Echec de création de la categorie");
  }
} catch (Exception $th) {
  produceError($th->getMessage());
}
    

// 20210226102505
// http://localhost/ecommpao/backend/api/createCategory.php?
// name=APICategory26/02

// {
//   "status": 200,
//   "result": "Categorie créée avec succès",
//   "args": {
//     "name": "APICategory26/02"
//   },
//   "time": "26/02/2021 10:25:05"
// }
