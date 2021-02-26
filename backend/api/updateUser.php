<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["id"])
    || !isset($_REQUEST["sexe"])
    || !isset($_REQUEST["pseudo"])
    || !isset($_REQUEST["firstname"])
    || !isset($_REQUEST["lastname"])
    || !isset($_REQUEST["description"])
    || !isset($_REQUEST["dateBirth"])
    || !isset($_REQUEST["adresse_facturation"])
    || !isset($_REQUEST["adresse_livraison"])
    || !isset($_REQUEST["tel"])
    || !isset($_REQUEST["email"])
    || !isset($_REQUEST["password"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["id"])
    || empty($_REQUEST["sexe"])
    || empty($_REQUEST["pseudo"])
    || empty($_REQUEST["firstname"])
    || empty($_REQUEST["lastname"])
    || empty($_REQUEST["description"])
    || empty($_REQUEST["dateBirth"])
    || empty($_REQUEST["adresse_facturation"])
    || empty($_REQUEST["adresse_livraison"])
    || empty($_REQUEST["tel"])
    || empty($_REQUEST["email"])
    || empty($_REQUEST["password"])
) {
    produceErrorRequest();
    return;
}

try {
    $user = new UserEntity();
    $user->setIdUser($_REQUEST["id"]);
    $user->setSexe($_REQUEST["sexe"]);
    $user->setPseudo(($_REQUEST["pseudo"]));
    $user->setFirstname($_REQUEST["firstname"]);
    $user->setLastname($_REQUEST["lastname"]);
    $user->setDescription($_REQUEST["description"]);
    $user->setDateBirth($_REQUEST["dateBirth"]);
    $user->setAdresseFacturation($_REQUEST["adresse_facturation"]);
    $user->setAdresseLivraison($_REQUEST["adresse_livraison"]);
    $user->setTel($_REQUEST["Tel"]);
    $user->setEmail($_REQUEST["email"]);
    $user->setPassword($_REQUEST["password"]);

    $data = $db->updateUsers($user);

    if ($data) {
        produceResult('modification réussie ;');
    } else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}




// 20210225160031
// http://localhost/ecommpao/backend/api/updateUser.php?id=63&sexe=0&pseudo=26/02&firstname=26/02&lastname=26/02&description=26/02&email=26/02@mail.com
// http://localhost/ecommpao/backend/api/updateUser.php?
// id=51
// &sexe=1
// &pseudo=26/02
// &firstname=26/02
// &lastname=26/02
// &description=26/02
// &email=26/02@mail.com
// &password=1234
// &dateBirth=26/02/2021
// &adresse_facturation=26/02
// &adresse_livraisonn=26/02
// &Tel=2602
// &email=2602@mail.com
// &password=1234
// {
//     "status": 400,
//     "message": "Requête mal formulée",
//     "args": {
//       "id": "63",
//       "sexe": "0",
//       "pseudo": "26/02",
//       "firstname": "26/02",
//       "lastname": "26/02",
//       "email": "26/02@mail.com",
//       "dateBirth": "26/02/2021"
//     },
//     "time": "25/02/2021 16:00:31"
//   }
