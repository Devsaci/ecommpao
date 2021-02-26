<?php 
require 'commun_services.php';

try {
    $users = $db->getUsers();
    if($users){
        produceResult(clearDataArray($users));
    }else {
        produceError("Problème de Récupération des utilisateurs");
    }
} catch (Exception $th) {
    produceError("Echec de Récupération des utilisateurs");
}


// 20210226165318
// http://localhost/ecommpao/backend/api/getUsers.php

// {
//     "status": 200,
//     "result": [
//       {
//         "idUser": "1",
//         "email": "jean25@gmail.com",
//         "sexe": 1,
//         "firstname": "DUPONT",
//         "lastname": "Jean"
//       }....... 
//       {
//         "idUser": "54",
//         "email": "email2602@email.fr",
//         "sexe": 1,
//         "firstname": "firstname2602",
//         "lastname": "lastname2602"
//       },
//       {
//         "idUser": "57",
//         "email": "email2602fordelete@email.fr",
//         "sexe": 1,
//         "firstname": "firstname2602",
//         "lastname": "lastname2602"
//       }
//     ],
//     "args": [
      
//     ],
//     "time": "26/02/2021 16:53:17"
//   }