
<?php
//import des parametres de connection à la BD 
require 'config/config.php';
require 'model/DataLayer.class.php';
require 'entity/userEntity.php';
//Instantiation objet DataLayer
$db = new DataLayer();

$users = $db->getUsers();
var_dump($users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    ecommpao init
</body>
</html>