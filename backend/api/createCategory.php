<?php 
require 'commun_services.php';


if(!isset($_REQUEST['name']) ){
    produceErrorRequest();
    return;
}




