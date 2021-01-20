<?php 
require 'commun_services.php'; 

if(!isset($_REQUEST["sexe"]) || !isset($_REQUEST["pseudo"]) || !isset($_REQUEST["firstname"]) || !isset($_REQUEST["lastname"])
|| !isset($_REQUEST["password"])|| !isset($_REQUEST["email"]) || !isset($_REQUEST["dateBirth"])){
    produceErrorRequest();
    return;
}
if(empty($_REQUEST["sexe"]) || empty($_REQUEST["pseudo"]) || empty($_REQUEST["email"]) || empty($_REQUEST["password"])
 || empty($_REQUEST["firstname"]) || empty($_REQUEST["lastname"]) || empty($_REQUEST["dateBirth"]) ){
    produceErrorRequest();
    return;
}

$user = new UserEntity();
$user->setSexe($_REQUEST["sexe"]);
$user->setPseudo(($_REQUEST["pseudo"]));
$user->setFirstname($_REQUEST["firstname"]);
$user->setLastname($_REQUEST["lastname"]);
$user->setEmail($_REQUEST["email"]);
$user->setPassword($_REQUEST["password"]);
$user->setDateBirth($_REQUEST["dateBirth"]);
try {
    $data = $db->createUser($user);

    if($data){
        produceResult("Compte utilisateur créé avec succès");
    }else{
        produceError("Problème rencontré lors de la création du compte");
    }

} catch (Exception $th) {
    produceError($th->getMessage());
}

// 20210120122415
// http://localhost/ecommpao/backend/api/createUsers.php

// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": [
      
//     ],
//     "time": "20/01/2021 12:24:14"
//   }
// http://localhost/ecommpao/backend/api/createUsers.php?email=email@email.fr&password=1968&firstname=firstname&lastname=lastname&sexe=1&pseudo=pseudo&dateBirth=12/12/2020

// {
//     "status": 200,
//     "result": "Compte utilisateur créé avec succès",
//     "args": {
//       "email": "email@email.fr",
//       "firstname": "firstname",
//       "lastname": "lastname",
//       "sexe": "1",
//       "pseudo": "pseudo",
//       "dateBirth": "12/12/2020"
//     },
//     "time": "20/01/2021 15:38:02"
//   }