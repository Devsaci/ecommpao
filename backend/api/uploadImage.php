<?php 
require "commun_services.php";

if(isset($_FILES) && is_array($_FILES)){

    if(isset($_FILES['image']["name"]) ){
        $dirImage = realpath("..")."/images/products/".$_FILES['image']["name"];

    }else{
produceError("Fichier incorect");
    }

}else{
    produceErrorRequest();
}