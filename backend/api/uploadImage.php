<?php 
require "commun_services.php";

if(isset($_FILES) && is_array($_FILES)){
   
}else{
    produceErrorRequest();
}