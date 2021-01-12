<?php 
date_default_timezone_set("Europe/Paris");
header("Content-type: application/json; charset=UTF-8");
define("API", dirname(__FILE__));
define("ROOT", dirname(API));
define("SP",DIRECTORY_SEPARATOR);
define("CONFIG", ROOT.SP."config"); 
define("MODEL", ROOT.SP."model");
define("ENTITY", ROOT.SP."entity");



