<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["sexe"]) 
    || !isset($_REQUEST["pseudo"])
    || !isset($_REQUEST["email"])
    || !isset($_REQUEST["password"]) 
    || !isset($_REQUEST["firstname"]) 
    || !isset($_REQUEST["lastname"])
    || !isset($_REQUEST["dateBirth"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["sexe"]) 
    || empty($_REQUEST["pseudo"])
    || empty($_REQUEST["email"]) 
    || empty($_REQUEST["password"])
    || empty($_REQUEST["firstname"]) 
    || empty($_REQUEST["lastname"])
    || empty($_REQUEST["dateBirth"])
) {
    produceErrorRequest();
    return;
}


try {
    $user = new UserEntity();
    $user->setSexe($_REQUEST["sexe"]);
    $user->setPseudo(($_REQUEST["pseudo"]));
    $user->setEmail($_REQUEST["email"]);
    $user->setPassword($_REQUEST["password"]);
    $user->setFirstname($_REQUEST["firstname"]);
    $user->setLastname($_REQUEST["lastname"]);
    $user->setDateBirth($_REQUEST["dateBirth"]);

    $data = $db->createUser($user);

    if ($data) {
        produceResult("Compte utilisateur créé avec succès");
    } else {
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
// http://localhost/ecommpao/backend/api/createUsers.php?email=email61@email.fr&password=1234&firstname=firstname61&lastname=lastname61&sexe=1&pseudo=pseudo61&dateBirth=12/12/2020

// {
//     "status": 200,
//     "result": "Compte utilisateur créé avec succès",
//     "args": {
//       "email": "email61@email.fr",
//       "firstname": "firstname61",
//       "lastname": "lastname61",
//       "sexe": "1",
//       "pseudo": "pseudo61",
//       "dateBirth": "12/12/2020"
//     },
//     "time": "10/02/2021 19:19:39"
//   }

// 20210225173007
// http://localhost/ecommpao/backend/api/createUsers.php?email=email2502@email.fr&password=1234&firstname=firstname2502&lastname=lastname2502&sexe=1&pseudo=2502&dateBirth=12/12/2020

// {
//     "status": 200,
//     "result": "Compte utilisateur créé avec succès",
//     "args": {
//       "email": "email2502@email.fr",
//       "firstname": "firstname2502",
//       "lastname": "lastname2502",
//       "sexe": "1",
//       "pseudo": "2502",
//       "dateBirth": "12/12/2020"
//     },
//     "time": "25/02/2021 17:30:07"
//   }