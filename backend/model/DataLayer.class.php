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
    function createUser(UserEntity $user){
        $sql = "INSERT INTO ".DB_NAME.".`customers` (sexe,pseudo,email,password,firstname,lastname,dateBirth)
        VALUES (:sexe,:pseudo,:email,:password,:firstname,:lastname,:dateBirth)";try {
           
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

            
            if($data){
                return TRUE;
            }else {
                return FALSE;
            } 
            
        
        } catch (PDOException $th) {
            return NULL;
        }


    }


}
