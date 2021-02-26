<?php
require 'commun_services.php';

if (
    !isset($_POST["sexe"]) 
    || !isset($_POST["pseudo"])
    || !isset($_POST["email"])
    || !isset($_POST["password"]) 
    || !isset($_POST["firstname"]) 
    || !isset($_POST["lastname"])
    || !isset($_POST["dateBirth"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_POST["sexe"]) 
    || empty($_POST["pseudo"])
    || empty($_POST["email"]) 
    || empty($_POST["password"])
    || empty($_POST["firstname"]) 
    || empty($_POST["lastname"])
    || empty($_POST["dateBirth"])
) {
    produceErrorRequest();
    return;
}


try {
    $user = new UserEntity();
    $user->setSexe($_POST["sexe"]);
    $user->setPseudo(($_POST["pseudo"]));
    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);
    $user->setFirstname($_POST["firstname"]);
    $user->setLastname($_POST["lastname"]);
    $user->setDateBirth($_POST["dateBirth"]);

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