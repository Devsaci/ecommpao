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









// $order = new OrdersEntity();
// $order->setIdUser(11);
// $order->setIdProduct(30);
// $order->setQuantity(5);
// $order->setPrice(57.77);

// $var = $db->createOrders($order);
// //var_dump($var);
// // var_dump($order);
// echo "<pre>";
// print_r($order);




// $users = $db->getUsers();
// var_dump($users);

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
// $product->setName(' new talons hauts');
// $product->setDescription(' new SARAIRIS 2020 mode été plate-forme talons hauts compensés décontracté confortable lumière loisirs chaussures femme sandales femmes chaussures femme');
// $product->setPrice(79.00);
// $product->setStock(201);
// $product->setCategory(1);
// $product->setImage('b4.png');

// $var = $db->updateProduct($product);
// var_dump($var); 
// echo "<pre>";
// print_r($product);



$order = new OrdersEntity;

$order->setIdOrder(1);
$order->setIdUser(11);
$order->setIdProduct(29);
$order->setQuantity(11);
$order->setPrice(57.99);

$var = $db->updateOrders($order);
var_dump($var); 
echo "<pre>";
print_r($order);








?>


