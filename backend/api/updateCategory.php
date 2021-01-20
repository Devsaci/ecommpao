<?php 
require 'commun_services.php';

if(!isset($_REQUEST['id']) || !isset($_REQUEST['name'])){
    produceErrorRequest();
    return;
}

if(empty($_REQUEST['id']) || empty($_REQUEST['name'])){
    produceErrorRequest();
    return;
}

$category = new CategoryEntity();

$category->setIdCategory($_REQUEST['id']);
$category->setName($_REQUEST['name']);



try {
    //code...
} catch (Exception $th) {
    produceError($th->getMessage());

