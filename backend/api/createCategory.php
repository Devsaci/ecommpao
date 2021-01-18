<?php 
require 'commun_services.php';


if(!isset($_REQUEST['name']) ){
    produceErrorRequest();
    return;
}



    $category = new CategoryEntity();
    $category->setName($_REQUEST['name']);
    
    $result = $db->createCategory($category);





    





 



