<?php
session_start();

require 'commun_services.php';


// Cas où l'utilisateur est déjà connecté
if(isset($_SESSION['ident'])){
    produceError("utilisateur déjà connecté");
    return;
}


// Cas où la requête est mal formulée
if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
    ProduceErrorRequest();
    return;
}

try {
    $user = new UserEntity();
    $user->setEmail($_REQUEST['email']);
    $user->setPassword($_REQUEST['password']);
    $dataAuth = $db->authentifier($user);
    if($dataAuth){ 
        // Authentification réussie
        $_SESSION['ident']=$dataAuth;
        produceResult(clearData($dataAuth));
        // produceResult($dataAuth);
    }else {
        //Echec d'autentification
        produceError("Email ou password incorrecte.");
    }

} catch (Exception $th) {
    produceError($th->getMessage());
}


//Request URL : 
//http://localhost/ecommpao/backend/api/authentifier.php?email=test@email.com&password=1234
//Respons => navig
/* {
    "status": 200,
    "result": {
      "ser": "57",
      "il": "test@email.com",
      "e": 1,
      "sword": null,
      "stname": "toto",
      "tname": "toto",
      "esseLivraison": "",
      "esseFacturation": "",
      "": null
    },
    "args": {
      "email": "test@email.com"
    },
    "time": "12/01/2021 14:49:51"
  }
 */

