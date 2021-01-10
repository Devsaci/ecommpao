<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<h1><strong>EcommPao Init </strong></h1>
    
</body>
</html>

<?php
//import des parametres de connection à la BD 
require 'config/config.php';
require 'model/DataLayer.class.php';
require 'entity/userEntity.php';
require 'entity/categoryEntity.php';
require 'entity/productEntity.php'; 
require 'entity/ordersEntity.php'; 


//Instantiation objet DataLayer
$db = new DataLayer();

$users = $db->getUsers();
var_dump($users);

// $categories = $db->getCategory();
// var_dump($categories);

// $products = $db->getProduct();
// var_dump($products);

// $orders = $db->getOrders();
// var_dump($orders);

// $user =new UserEntity();
// $user->setPseudo("motivation");
// $user->setEmail("zakaria@mail.com");
// $user->setFirstname("Firstname");
// $user->setLastname("Lastname");
// $user->setAdresseFacturation("AdresseFacturation");
// $user->setAdresseLivraison("AdresseLivraison");
// $user->setSexe(1);
// $user->setIdUser(2);

// $var = $db->updateUsers($user);
// var_dump($var); 



// $category =new CategoryEntity();
// $category ->setIdCategory(1);
// $category ->setName("Talons femmes");

// $var = $db->updateCategory($category);
// var_dump($var); 


// $product = new ProductEntity();
// $product->setIdproduct(1);
// $product->setName('name');
// $product->setDescription(':description');
// $product->setPrice(':price');
// $product->setStock(':stock');
// $product->setImage(':category');


?>


