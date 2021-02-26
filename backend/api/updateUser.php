<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["idUser"])
    || !isset($_REQUEST["sexe"])
    || !isset($_REQUEST["pseudo"])
    || !isset($_REQUEST["email"])
    || !isset($_REQUEST["password"])
    || !isset($_REQUEST["firstname"])
    || !isset($_REQUEST["lastname"])
   
    // || !isset($_REQUEST["description"])
    // || !isset($_REQUEST["dateBirth"])
    // || !isset($_REQUEST["adresse_facturation"])
    // || !isset($_REQUEST["adresse_livraison"])
    // || !isset($_REQUEST["tel"])

) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["idUser"])
    || empty($_REQUEST["sexe"])
    || empty($_REQUEST["pseudo"])
    || empty($_REQUEST["email"])
    || empty($_REQUEST["password"])
    || empty($_REQUEST["firstname"])
    || empty($_REQUEST["lastname"])
  
    // || empty($_REQUEST["description"])
    // || empty($_REQUEST["dateBirth"])
    // || empty($_REQUEST["adresse_facturation"])
    // || empty($_REQUEST["adresse_livraison"])
    // || empty($_REQUEST["tel"])

) {
    produceErrorRequest();
    return;
}

try {
    $user = new UserEntity();
    $user->setIdUser($_REQUEST["idUser"]);
    $user->setSexe($_REQUEST["sexe"]);
    $user->setPseudo(($_REQUEST["pseudo"]));
    $user->setEmail($_REQUEST["email"]);
    $user->setPassword($_REQUEST["password"]);
    $user->setFirstname($_REQUEST["firstname"]);
    $user->setLastname($_REQUEST["lastname"]);
   
    // $user->setDescription($_REQUEST["description"]);
    // $user->setDateBirth($_REQUEST["dateBirth"]);
    // $user->setAdresseFacturation($_REQUEST["adresse_facturation"]);
    // $user->setAdresseLivraison($_REQUEST["adresse_livraison"]);
    // $user->setTel($_REQUEST["Tel"]);
 

    $data = $db->updateUsers($user);

    if ($data) {
        produceResult('modification réussie ;');
    } else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}


// 20210226183854
// http://localhost/ecommpao/backend/api/updateUser.php?
// idUser=57&
// sexe=2& (ATTENTION SEXE '0' pose preblmee? avec APIupdateUser ???????)
// pseudo=26&
// email=email26022021@email.fr&
// password=1234&
// firstname=2602&
// lastname=2602

// {
//     "status": 200,
//     "result": "modification réussie ;",
//     "args": {
//       "idUser": "57",
//       "sexe": "2",
//       "pseudo": "26",
//       "email": "email26022021@email.fr",
//       "firstname": "2602",
//       "lastname": "2602"
//     },
//     "time": "26/02/2021 18:38:54"
//   }