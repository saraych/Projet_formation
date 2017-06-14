<?php
//session_start();

ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);

/* Connexion à une base ODBC avec l'invocation de pilote */

//$dsn = 'mysql:dbname=bdname;host=localhost';
//$user = 'root';
//$password = '';
try {
    $dbh = new PDO("mysql:host=localhost; dbname=bdname;" ,"root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}