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
            //echo "connexion DB microbe_souck OK " . '<br>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * Méthode permettant d'authentifier un utilisateur 
     * @param UserEntity $user Objet métier décrivant un utilisateur 
     * @return UserEntity $user Objet métier décrivant l'utilisateur authentifié
     * @return FALSE En cas d'échec d'authentification
     * @return NULL Exception déclenchée 
     */
    function authentifier(UserEntity $user)
    {
        $sql = "SELECT * FROM " . DB_NAME . ".`customers` WHERE email = :email";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':email'=>$user->getEmail()
            ));

            $data = $result->fetch(PDO::FETCH_OBJ);
            // var_dump($data );

            if($data && ($data->password == sha1($user->getPassword()))){
                // authentification réussie
                $user->setIdUser($data->id);
                $user->setSexe($data->sexe);
                $user->setFirstname($data->firstname);
                $user->setLastname($data->lastname);
                $user->setPassword(NULL);
                $user->setAdresseFacturation($data->adresse_facturation);
                $user->setAdresseLivraison($data->adresse_livraison);
                $user->setTel($data->tel);
                // $user->setDateBirth($data->dateBirth);

                return $user;
            } else {
                // authentification échouée
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }




    /* CREAT Method */

    /**
     * Methode permettant de créer un utilisateur en BD 
     * @param UserEntity $user Objet métier décrivant un un utilisateur
     * @return TRUE Persistance réussie
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */
    function createUser(UserEntity $user)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`customers` (sexe,pseudo,email,password,firstname,lastname)
        VALUES (:sexe,:pseudo,:email,:password,:firstname,:lastname)";
        try {

            $result = $this->connexion->prepare($sql);
            $data = $result->fetch(PDO::FETCH_OBJ);
            $data = $result->execute(array(
                ':sexe' => $user->getSexe(),
                ':pseudo' => $user->getPseudo(),
                ':email' => $user->getEmail(),
                ':password' => sha1($user->getPassword()),
                ':firstname' => $user->getFirstname(),
                ':lastname' => $user->getLastname(),
            ));
            

            var_dump($sql);
            var_dump($data);
            //exit();

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
            $data = $result->fetch(PDO::FETCH_OBJ);
            $data = $result->execute(array(
                ':idCustomer' => $orders->getIdUser(),
                ':idProduct' => $orders->getIdProduct(),
                ':quantity' => $orders->getQuantity(),
                ':price' => $orders->getPrice()
            ));

            var_dump($sql);
            var_dump($data);
            //exit();

            if ($data) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /* READ METHOD */
    /**
     * Methode permettant de récupérer les utilisateur dans BD 
     * @param VOID ne prend pas de paramètre
     * @return ARRAY Tableau contenant les données utilisateurs
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */

    function getUsers()
    {
        $sql =  "SELECT * FROM microbe_souck.`customers`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $users = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                $user = new UserEntity();
                $user->setIdUser($data->id);
                $user->setEmail($data->email);
                $user->setSexe($data->sexe);
                $user->setFirstname($data->firstname);
                $user->setLastname($data->lastname);
                $users[] = $user;
            }

            // var_dump($sql); 
            // var_dump($var); 
            //exit();

            if ($users) {
                return $users;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }



    /**
     * Methode permettant de récupérer les catégories dans BD 
     * @param VOID ne prend pas de paramètre
     * @return ARRAY Tableau contenant les catégories
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */

    function getCategory()
    {
        $sql = "SELECT * FROM " . DB_NAME . ".`category`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            $categories = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                $category = new CategoryEntity();
                $category->setIdCategory($data->id);
                $category->setName($data->name);
                $categories[] = $category;
            }

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($categories) {
                return $categories;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de récupérer les produits dans BD 
     * @param VOID ne prend pas de paramètre
     * @return ARRAY Tableau contenant les produits
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */

    function getProduct()
    {
        $sql = "SELECT * FROM ".DB_NAME.".`product`";
        //echo  $sql;exit();
        try {
                $result = $this->connexion->prepare($sql);
                $var = $result->execute();
                $products = [];

         while($data = $result->fetch(PDO::FETCH_OBJ)){
               $product = new ProductEntity();
               $product->setIdProduct($data->id);
               $product->setName($data->name);
               $product->setDescription($data->description);
               $product->setPrice($data->price);
               $product->setStock($data->stock);
               $product->setImage($data->image);
               $product->setCategory($data->category);
               $product->setCreatedAt($data->createdat);

               $products[] = $product;
            }

            // var_dump($sql); 
            // var_dump($var); 
            // exit();

            if($products){
                return $products;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /**
     * Methode permettant de récupérer les commandes dans BD 
     * @param VOID ne prend pas de paramètre
     * @return ARRAY Tableau contenant les commande
     * @return FALSE Echec de la persistance
     * @return NULL Exception déclenchée
     */

    function getOrders()
    {
        $sql = "SELECT * FROM microbe_souck.`orders`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();


            $orders = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                $order = new OrdersEntity();
                $order->setIdOrder($data->id);
                $order->setIdUser($data->id_customers);
                $order->setIdProduct($data->id_product);
                $order->setPrice($data->price);
                $order->setQuantity($data->quantity);
                $order->setCreatedAd($data->createdat);
                $orders[] = $order;
            }

            // var_dump($sql); 
            // var_dump($var); 
            //exit();

            if ($orders) {
                return $orders;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }




    /* UPDATE METHOD*/

    /**
     * Methode permettant de mettre à jour des données d'un utilisateur dans BD 
     * @param UserEntity $user Objet métier décrivant un utilisateur
     * @return TRUE Mise à jour réussie
     * @return FALSE Echec de la mise à jour
     * @return NULL Exception déclenchée
     */

    function updateUsers(UserEntity $user)
    {
        $sql = "UPDATE microbe_souck.`customers` SET ";

        try {
            $sql .= " Pseudo = '" . $user->getPseudo() . "',";
            $sql .= " email = '" . $user->getEmail() . "',";
            $sql .= " sexe = '" . $user->getSexe() . "',";
            $sql .= " firstname = '" . $user->getFirstname() . "',";
            $sql .= " lastname = '" . $user->getLastname() . "',";
            $sql .= " adresse_facturation = '" . $user->getAdresseFacturation() . "',";
            $sql .= " adresse_livraison = '" . $user->getAdresseLivraison() . "'";
            $sql .= " WHERE id =" . $user->getIdUser();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // var_dump($sql); 
            // var_dump($var); 
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de mettre à jour une catégorie dans BD 
     * @param CategoryEntity $category Objet métier décrivant une categorie
     * @return TRUE Mise à jour réussie
     * @return FALSE Echec de la mise à jour
     * @return NULL Exception déclenchée
     */
    function updateCategory(CategoryEntity $category)
    {
        $sql = "UPDATE microbe_souck.`category` SET `name`=:name WHERE id=:id";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':name' => $category->getName(),
                ':id' => $category->getIdCategory()
            ));
            // var_dump($sql);
            // var_dump($var);
            // exit();
            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de mettre à jour un produit dans BD 
     * @param ProductEntity $product Objet métier décrivant un produit
     * @return TRUE Mise à jour réussie
     * @return FALSE Echec de la mise à jour
     * @return NULL Exception déclenchée
     */
    function updateProduct(ProductEntity $product)
    {
        $sql = "UPDATE " . DB_NAME . ".`product` SET `name`=:name,`description`=:description,`price`=:price,
        `stock`=:stock,`category`=:category,`image`=:image WHERE id=:id";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':id' => $product->getIdproduct(),
                ':name' => $product->getName(),
                ':description' => $product->getDescription(),
                ':price' => $product->getPrice(),
                ':stock' => $product->getStock(),
                ':category' => $product->getCategory(),
                ':image' => $product->getImage()
            ));

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de mettre à jour une commande dans BD 
     * @param OrdersEntity $order Objet métier décrivant une commande
     * @return TRUE Mise à jour réussie
     * @return FALSE Echec de la mise à jour
     * @return NULL Exception déclenchée
     */
    function updateOrders(OrdersEntity $order)
    {
        $sql = "UPDATE " . DB_NAME . ".`orders` SET `id_customers`=:id_customers, `id_product`=:id_product, `quantity`=:quantity, `price`=:price
         WHERE id=:id";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(

                ':id' => $order->getIdOrder(),
                ':id_customers' => $order->getIduser(),
                ':id_product' => $order->getIdproduct(),
                ':quantity' => $order->getQuantity(),
                ':price' => $order->getPrice()
            ));

            // var_dump($sql);
            // var_dump($var);
            //exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /* DELET METHOD */

    /**
     * Methode permettant de supprimer un utilisateur dans BD 
     * @param UserEntity $user Objet métier décrivant un utilisateur
     * @return TRUE Suppression réussie
     * @return FALSE Echec de la suppression
     * @return NULL Exception déclenchée
     */
    function deleteUsers(UserEntity $user)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`customers` WHERE id=" . $user->getIdUser();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }



    /**
     * Methode permettant de supprimer un produit dans BD 
     * @param ProductEntity $product Objet métier décrivant un produit
     * @return TRUE Suppression réussie
     * @return FALSE Echec de la suppression
     * @return NULL Exception déclenchée
     */
    function deleteProduct(ProductEntity $product)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`product` WHERE id=" . $product->getIdProduct();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /**
     * Methode permettant de supprimer une categorie dans BD 
     * @param CategoryEntity $user Objet métier décrivant une categorie
     * @return TRUE Suppression réussie
     * @return FALSE Echec de la suppression
     * @return NULL Exception déclenchée
     */
    function deleteCategory(CategoryEntity $category)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`category` WHERE id=" . $category->getIdCategory();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /**
     * Methode permettant de supprimer une commande dans BD 
     * @param OrdersEntity $order Objet métier décrivant une commande
     * @return TRUE Suppression réussie
     * @return FALSE Echec de la suppression
     * @return NULL Exception déclenchée
     */
    function deleteOrders(OrdersEntity $order)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`orders` WHERE id=" . $order->getIdOrder();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // var_dump($sql);
            // var_dump($var);
            // exit();

            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
}
