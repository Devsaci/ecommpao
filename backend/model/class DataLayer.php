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
}
