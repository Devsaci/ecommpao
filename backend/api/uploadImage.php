<?php 
require "commun_services.php";

if(isset($_FILES) && is_array($_FILES)){

    if(isset($_FILES['image']["name"]) ){
        $dirImage = realpath("..")."/images/products/".$_FILES['image']["name"];
        $save = move_uploaded_file($_FILES['image']["tmp_name"],$dirImage);

        if($save){
            produceResult($_FILES);
        }else{
            produceError("Erreur de stockage de l'image");
        }


    }else{
produceError("Fichier incorect");
    }

}else{
    produceErrorRequest();
}

// 20210121172723
// http://localhost/ecommpao/backend/api/uploadImage.php

// {
//     "status": 200,
//     "result": {
//       "image": {
//         "name": "2011-11-06 10.15.26.jpg",
//         "type": "image/jpeg",
//         "tmp_name": "C:\\xampp\\tmp\\phpC504.tmp",
//         "error": 0,
//         "size": 1219090
//       }
//     },
//     "args": [
      
//     ],
//     "time": "21/01/2021 17:27:23"
//   }

