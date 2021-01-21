<?php 
require 'commun_services.php'; 

if(!isset($_POST["sexe"]) || !isset($_POST["pseudo"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"])
|| !isset($_POST["password"])|| !isset($_POST["email"]) || !isset($_POST["dateBirth"])){
    produceErrorRequest();
    return;
}
if(empty($_POST["sexe"]) || empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"])
 || empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["dateBirth"]) ){
    produceErrorRequest();
    return;
}

$user = new UserEntity();
$user->setSexe($_POST["sexe"]);
$user->setPseudo(($_POST["pseudo"]));
$user->setFirstname($_POST["firstname"]);
$user->setLastname($_POST["lastname"]);
$user->setEmail($_POST["email"]);
$user->setPassword($_POST["password"]);
$user->setDateBirth($_POST["dateBirth"]);
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