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

// 20210226165101
// http://localhost/ecommpao/backend/api/createUsers.php?
// id=57&
// sexe=0&
// pseudo=2602fordelete2602&
// email=email2602fordelete2602@email.fr&
// password=1234&
// firstname=2602firstname2602&
// lastname=2602lastname2602&
// dateBirth=26/02/2021

// {
//     "status": 200,
//     "result": "Compte utilisateur créé avec succès",
//     "args": {
//       "sexe": "1",
//       "pseudo": "2602fordelete",
//       "email": "email2602fordelete@email.fr",
//       "firstname": "firstname2602",
//       "lastname": "lastname2602",
//       "dateBirth": "26/02/2021"
//     },
//     "time": "26/02/2021 16:51:01"
//   }