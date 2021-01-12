
<?php 
require 'commun_services.php';
// produceError("Erreur de Test");
// produceErrorAuth();
// produceErrorRequest();
//produceResult(['email' => 'contact@mail.com']);

//Test function clearData($objetMetier)
$user = new UserEntity;
$user->setEmail('contact@mail.com');
$user->setPassword('1234');
// var_dump(clearData($user));
produceResult($user);




?>