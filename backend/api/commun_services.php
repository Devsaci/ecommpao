<?php 
date_default_timezone_set("Europe/Paris");
header("Content-type: application/json; charset=UTF-8");
define("API", dirname(__FILE__));
define("ROOT", dirname(API));
define("SP",DIRECTORY_SEPARATOR);
define("CONFIG", ROOT.SP."config"); 
define("MODEL", ROOT.SP."model");
define("ENTITY", ROOT.SP."entity");

require CONFIG.SP."config.php";
require MODEL.SP."DataLayer.class.php";
require ENTITY.SP."userEntity.php";
require ENTITY.SP."categoryEntity.php";
require ENTITY.SP."productEntity.php";
require ENTITY.SP."ordersEntity.php";


$db = new DataLayer();

function produceError($message){
    answer(['status'=>404,'message'=>$message]);
}
function produceErrorAuth(){
    answer(['status'=>401,'message'=>'Authentification requis !']);
}


function produceErrorRequest(){
    answer(['status'=>400,'message'=>'Requête mal formulée']);
}







