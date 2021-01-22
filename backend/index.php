
<?php
require 'config/config.php';
define("BASE_URL", dirname($_SERVER['SCRIPT_NAME']));


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
   
   a{
     color: black;
   }
   p{
    background-color: #fff; 
    font-size: 35px;
    border: 1px solid rgba(0,0,0,.1);
    box-shadow:
      0 10px 20px rgba(0,0,0,.22),
      0 14px 56px rgba(0,0,0,.25);
    
   }
   p span:nth-child(1){
     display: inline-block;
      font-size: 44px;
      font-weight: 700;
      min-width: 200px;
      padding: 6px 15px;
      text-align: center;
      color: #fff;
   }
   p span:nth-child(2){
    font-size: 35px;
    font-weight: 700;
   }
   .get{
    background-color: #3caab5;
    text-transform: uppercase;
   }
   .post{
    background-color: #78bc61;
    text-transform: uppercase;
   }
   .delete{
    background-color: #f93e3e;
    text-transform: uppercase;
   }
   .put{
    background-color: #fca130;
    text-transform: uppercase;
   }
   nav.navbar{
       background-color: #288690 !important;
   }

</style>

    <title>API microbe_souck </title>
</head>
<body> 
<!-- <h1><strong>DOCUMENTATION </strong></h1> -->
<div class="container">
<h1 class="text-center display-4">Documentation API microbe_souck</h1>

<?php
        
        // Ouverture du dossier API
        foreach ($_ROUTES as $key => $entity) {
            $response = "<div id='$entity' class='display-4'><h4>".ucwords($entity)."</h4>";
            foreach ($METHODES as $methode => $description) {
              $response .= "<p><span class='$methode'> $methode </span> 
              <span class='url'>
              <a href='".BASE_URL."/api/$entity'target='_blank'> /api/$entity</a>
              </span> 
              ".$description['description']." : $entity</p>";
            }
            echo $response.'</div>';
        }

    ?>


</div>
</body>
</html>



<?php
//import des parametres de connection à la BD 
// require 'config/config.php';
// require 'model/DataLayer.class.php';
// require 'entity/userEntity.php';
// require 'entity/categoryEntity.php';
// require 'entity/productEntity.php'; 
// require 'entity/ordersEntity.php'; 


//Instantiation objet DataLayer
// $db = new DataLayer();




// $user = new UserEntity();
// $user->setEmail("test3@email.com");
// $user->setPassword("1234");
// $var = $db->authentifier($user);

// var_dump($var);
// echo "<pre>";
// print_r($var);


// $category =new CategoryEntity();
// $category ->setIdCategory(1);
// $category ->setName("categorie test1");
// $var = $db->createCategory($category);
// echo "<pre>";
// print_r($category);



// $user1 = new UserEntity();
// $user1->setSexe(1);
// $user1->setPseudo("SACI");
// $user1->setEmail("test3@email.com");
// $user1->setPassword("1234");
// $user1->setFirstname("toto");
// $user1->setLastname("toto");;
// $var = $db->createUser($user1);

// echo "<pre>";
// print_r($user1);



// $order = new OrdersEntity();
// $order->setIdUser(11);
// $order->setIdProduct(30);
// $order->setQuantity(50);
// $order->setPrice(200);

// $var = $db->createOrders($order);
// // var_dump($var);
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



// $order = new OrdersEntity;

// $order->setIdOrder(1);
// $order->setIdUser(11);
// $order->setIdProduct(29);
// $order->setQuantity(11);
// $order->setPrice(57.99);

// $var = $db->updateOrders($order);
// var_dump($var); 
// echo "<pre>";
// print_r($order);


// $user =new UserEntity();
// $user->setIdUser(40);
// $var = $db->deleteUsers($user);



// $product =new ProductEntity();
// $product->setIdProduct(24);
// $var = $db->deleteProduct($product);


// $category =new CategoryEntity();
// $category->setIdCategory(24);
// $var = $db-> deleteCategory($category);



// $order =new OrdersEntity();
// $order->setIdOrder(25);
// $var = $db-> deleteOrders($order);





