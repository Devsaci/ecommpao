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



    
    //code...
} catch (Exception $th) {
    produceError($th->getMessage());
}

