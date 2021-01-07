<?php

/**
 * DataLayer.class.php
 * @author Saci zakaria
 * Site Web : ##########
 */

class DataLayer
{
    private $connexion;
    function __construct()
    {

        $var = "mysql:host=" . HOST . ";db_name=" . DB_NAME;

        try {
            $this->connexion = new PDO($var, DB_USER, DB_PASSWORD);
            echo "connexion DB microbe_souck OK ";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Methode permettant de créer un utilisateur en BD 
     * @param UserEntity $user Objet métier décrivant un un utilisateur
     * @return TRUE Persistance réussie
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */
    function createUser(UserEntity $user)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`customers` (sexe,pseudo,email,password,firstname,lastname,dateBirth)
        VALUES (:sexe,:pseudo,:email,:password,:firstname,:lastname,:dateBirth)";
        try {

            $result = $this->connexion->prepare($sql);

            $data = $result->execute(array(
                ':sexe' => $user->getSexe(),
                ':pseudo' => $user->getPseudo(),
                ':email' => $user->getEmail(),
                ':password' => sha1($user->getPassword()),
                ':firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                ':dateBirth' => $user->getDateBirth()
            ));


            if ($data) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de créer une categorie en BD 
     * @param CategoryEntity $category Objet métier décrivant une categorie
     * @return TRUE Persistance réussie
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */

    function createCategory(CategoryEntity $category)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`category`(`category`) VALUES (:name)";
        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(array(
                ':name' => $category->getName()
            ));
            if ($data) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (\PDOException $th) {
            return NULL;
        }
    }



    /**
     * Methode permettant de créer un produit en BD 
     * @param ProductEntity $product Objet métier décrivant un product
     * @return TRUE Persistance réussie
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */
    function createProduct(ProductEntity $product)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`product`(`name`, `description`, `price`, `stock`, `category`, `image`) 
        VALUES (:name,:description,:price,:stock,:category,:image)";
        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(array(
                ':name' => $product->getName(),
                ':description' => $product->getDescription(),
                ':price' => $product->getPrice(),
                ':stock' => $product->getStock(),
                ':category' => $product->getCategory(),
                ':image' => $product->getImage()
            ));

            if ($data) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /**
     * Methode permettant de créer une commande en BD 
     * @param OrdersEntity $order un objet metier décrivant une commande
     * @return TRUE Persistance réussie
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */
    function createOrders(OrdersEntity $orders)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`orders`(`id_customers`, `id_product`, `quantity`, `price`)
         VALUES (:idCustomer,:idProduct,:quantity,:price)";

        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(array(
                'idCustomer' => $orders->getIdUser(),
                ':idProduct' => $orders->getIdProduct(),
                ':quantity' => $orders->getQuantity(),
                ':price' => $orders->getPrice()
            ));
            if ($data) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
}
