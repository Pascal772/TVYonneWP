<?php
// const DBHOST = 'localhost';
// const DBUSER = 'root';
// const DBPASS = '';
// const DBNAME = 'rps_dev_design';

// $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME;
$dsn = 'mysql:host=localhost;dbname=tvyonne';


try {
    $pdo = new PDO($dsn, 'root', '');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $pdo->exec('SET NAMES utf8');
    
} catch (PDOException $exception) {
    mail('mehdi.raposo77@gmail.com', 'PDOExcpeption', $exception->getMessage());
    exit('Erreur de connexion à la base de donnée');
}
