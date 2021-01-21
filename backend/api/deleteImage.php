<?php 
require "commun_services.php";

if(isset($_REQUEST["name"]) && !empty($_REQUEST["name"])){
    $urlImage ="../images/products/".$_REQUEST["name"];
    if(file_exists($urlImage)){
        unlink($urlImage);
        produceResult("Suppression de l'image réussie !");
    }else{
        produceError("L'image n'existe pas sur le serveur");
    }  
}else{
    produceErrorRequest();
}
// 20210121171738
// http://localhost/ecommpao/backend/api/deleteImage.php

// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": [
      
//     ],
//     "time": "21/01/2021 17:17:37"
//   }

// 20210121172221
// http://localhost/ecommpao/backend/api/deleteImage.php?name=2011-11-20%2020.12.31.jpg

// {
//     "status": 200,
//     "result": "Suppression de l'image réussie !",
//     "args": {
//       "name": "2011-11-20 20.12.31.jpg"
//     },
//     "time": "21/01/2021 17:22:21"
//   }