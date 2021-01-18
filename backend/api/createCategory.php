<?php 
require 'commun_services.php';


if(!isset($_REQUEST['name']) ){
    produceErrorRequest();
    return;
}



    $category = new CategoryEntity();
    $category->setName($_REQUEST['name']);
 


    try {
        $category = new CategoryEntity();
        $category->setName($_REQUEST['name']);
        
        $result = $db->createCategory($category);
    
    
        if($result){
            produceResult("Categorie créée avec succès");
        }else{
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
    





 



