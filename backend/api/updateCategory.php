<?php
require 'commun_services.php';

if (!isset($_REQUEST['id']) || !isset($_REQUEST['name'])) {
    produceErrorRequest();
    return;
}

if (empty($_REQUEST['id']) || empty($_REQUEST['name'])) {
    produceErrorRequest();
    return;
}




try {
    $category = new CategoryEntity();
    $category->setIdCategory($_REQUEST['id']);
    $category->setName($_REQUEST['name']);

    $data = $db->updateCategory($category);

    if ($data) {
        produceResult('modification réussie.');
    } else {
        produceError("Echec de la mise à jour.");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}

// 20210226103000
// http://localhost/ecommpao/backend/api/updateCategory.php?
// id=7&name=APICategorie27/02

// {
//     "status": 200,
//     "result": "modification réussie.",
//     "args": {
//       "id": "7",
//       "name": "APICategorie27/02"
//     },
//     "time": "26/02/2021 10:30:00"
//   }