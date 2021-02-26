<?php
// require 'config/config.php';
// define("BASE_URL", dirname($_SERVER['SCRIPT_NAME']));


?>

<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     -->
   <!-- <style>
       /*  a {
            color: black;
        }

        p {
            background-color: #fff;
            font-size: 35px;
            border: 1px solid rgba(0, 0, 0, .1);
            box-shadow:
                0 10px 20px rgba(0, 0, 0, .22),
                0 14px 56px rgba(0, 0, 0, .25);

        }

        p span:nth-child(1) {
            display: inline-block;
            font-size: 44px;
            font-weight: 700;
            min-width: 200px;
            padding: 6px 15px;
            text-align: center;
            color: #fff;
        }

        p span:nth-child(2) {
            font-size: 35px;
            font-weight: 700;
        }

        .get {
            background-color: #3caab5;
            text-transform: uppercase;
        }

        .post {
            background-color: #78bc61;
            text-transform: uppercase;
        }

        .delete {
            background-color: #f93e3e;
            text-transform: uppercase;
        }

        .put {
            background-color: #fca130;
            text-transform: uppercase;
        }

        nav.navbar {
            background-color: #288690 !important;
        } */
    </style>
   -->

   <!--  
    <title>API microbe_souck </title>
</head>
   -->

     <!--  
<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">microbe_souck API</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">
        <h1 class="text-center display-4">Documentation API microbe_souck</h1>
 -->
        <?php

        // Ouverture du dossier API
        // foreach ($_ROUTES as $key => $entity) {
        //     $response = "<div id='$entity' class='display-4'><h4>" . ucwords($entity) . "</h4>";
        //     foreach ($METHODES as $methode => $description) {
        //         $response .= "<p><span class='$methode'> $methode </span> 
        //       <span class='url'>
        //       <a href='" . BASE_URL . "/api/$entity'target='_blank'> /api/$entity</a>
        //       </span> 
        //       " . $description['description'] . " : $entity</p>";
        //     }
        //     echo $response . '</div>';
        // }

        ?>
  <!--  

    </div>
</body>

</html>
  -->


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



/* Authentification Method */ 
// $user = new UserEntity();
// $user->setEmail("test55@email.com");
// $user->setPassword("1234");
// $var = $db->authentifier($user);

// // // // var_dump($var);
// echo "<pre>";;
// print_r($var);

/* TEST create  */


/* TEST createUser  */
// $user1 = new UserEntity();
// $user1->setSexe(1);
// $user1->setPseudo("SACIdate");
// $user1->setEmail("testdate@email.com");
// $user1->setPassword("1234");
// $user1->setFirstname("toto");
// $user1->setLastname("toto");;
// $var = $db->createUser($user1);

// echo "<pre>";
// print_r($user1);


/* TEST createCategory  */
// $category =new CategoryEntity();
// // $category ->setIdCategory(1);
// $category ->setName("categorie testsaci12");
// $var = $db->createCategory($category);
// echo "<pre>";
// print_r($category);


/* TEST createOrders  */
// $order = new OrdersEntity();
// $order->setIdUser(21);
// $order->setIdProduct(11);
// $order->setQuantity(11);
// $order->setPrice(11);
// $var = $db->createOrders($order);

// echo "<pre>";
// print_r($order);

/* TEST createProduct  */
// $product = new ProductEntity();
// $product->setName("productsacidate2");
// $product->setDescription("productsacidate2");
// $product->setPrice(1000);
// $product->setStock(10000);
// $product->setCategory(11);
// $product->setImage("imagesacidate2.png");
// $var = $db->createProduct($product);

// echo "<pre>";
// print_r($product);







/* TEST Read (get)  */

// $users = $db->getUsers();
// // var_dump($users);
// echo "<pre>";
// print_r($users);

// $categories = $db->getCategory();
// // var_dump($categories);
// echo "<pre>";
// print_r($categories);

// $products = $db->getProduct();
// // var_dump($products);
// echo "<pre>";
// print_r($products);

// $orders = $db->getOrders();
// // var_dump($orders);
// echo "<pre>";
// print_r($orders);


                            /* TEST update */
/* TEST update CategoryEntity*/
// $category =new CategoryEntity();
// $category ->setIdCategory(1);
// $category ->setName("Talons femmes");

// $var = $db->updateCategory($category);
// echo "<pre>";
// print_r($category);


/* TEST update  OrdersEntity*/
// $order = new OrdersEntity;
// $order->setIdOrder(19);
// $order->setIdUser(11);
// $order->setIdProduct(11);
// $order->setQuantity(11);
// $order->setPrice(11);

// $var = $db->updateOrders($order);
// echo "<pre>";
// print_r($order);


/* TEST update ProductEntity*/
// $product = new ProductEntity();
// $product->setIdproduct(41);
// $product->setName('Productsacidate1fetch');
// $product->setDescription(' description Productsacidate1fetch');
// $product->setPrice(100.00);
// $product->setStock(100);
// $product->setCategory(1);
// $product->setImage('img2021.png');
// // $product->setCreatedAt('2020/12/12');

// $var = $db->updateProduct($product);
// echo "<pre>";
// print_r($product);


/* TEST update UserEntity */
// $user =new UserEntity();
// $user->setIdUser(51);
// $user->setSexe(0);
// $user->setPseudo("SACI26/02");
// $user->setFirstname("SACI");
// $user->setLastname("Zakaria");
// $user->setDescription("description26/02");
// $user->setdateBirth("16/09/1968");
// $user->setAdresseFacturation("AdresseFacturation");
// $user->setAdresseLivraison("AdresseLivraison");
// $user->setEmail("zakaria2602@mail.com");
// $user->setPassword("1234");
///////////////////////////////////////////////////////
// $user->setIdUser(64);
// $user->setSexe(1);
// $user->setPseudo("SACI2502");
// $user->setFirstname("SACI");
// $user->setLastname("Zakaria");
// $user->setDescription("description");
// $user->setdateBirth("16/09/1968");
// $user->setAdresseFacturation("AdresseFacturation");
// $user->setAdresseLivraison("AdresseLivraison");
// $user->setTel("0695065455");
// $user->setEmail("zakaria51@mail.com");
// $user->setPassword("1234");

$var = $db->updateUsers($user);
echo "<pre>";
print_r($user);

/* TEST Delete */

// $category =new CategoryEntity();
// $category->setIdCategory(24);
// $var = $db-> deleteCategory($category);

// $order =new OrdersEntity();
// $order->setIdOrder(25);
// $var = $db-> deleteOrders($order);

// $product =new ProductEntity();
// $product->setIdProduct(24);
// $var = $db->deleteProduct($product);

// $user =new UserEntity();
// $user->setIdUser(40);
// $var = $db->deleteUsers($user);

// $user =new UserEntity();
// $user->setIdUser(40);
// $var = $db->deleteUsers($user);







