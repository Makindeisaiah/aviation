<?php

// ? database connection
$database_host = 'localhost';
$database_db   = 'aviation';
$database_user = 'root';
$database_pass = '';
$database_charset = 'utf8mb4';

// database connection
// $database_host = 'localhost';
// $database_db   = 'u289718295_middlemanbet';
// $database_user = 'u289718295_middlemanbet';
// $database_pass = 'Middlemanbet12345$';
// $database_charset = 'utf8mb4';


$database_dsn = "mysql:host=$database_host;dbname=$database_db;charset=$database_charset";
$database_options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($database_dsn, $database_user, $database_pass, $database_options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}






