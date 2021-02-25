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
    


// 20210118174230
// http://localhost/ecommpao/backend/api/createCategory.php

/* {
    "status": 400,
    "message": "Requête mal formulée",
    "args": [
      
    ],
    "time": "18/01/2021 17:42:30"
  } */


// http://localhost/ecommpao/backend/api/createCategory.php?name=

/* {
    "status": 404,
    "message": "Echec de création de la categorie",
    "args": {
      "name": ""
    },
    "time": "18/01/2021 17:46:23"
  } */




// http://localhost/ecommpao/backend/api/createCategory.php?name=API%20Category%20Test
/* 
{
    "status": 200,
    "result": "Categorie créée avec succès",
    "args": {
      "name": "API Category Test"
    },
    "time": "18/01/2021 21:13:25"
  } */
