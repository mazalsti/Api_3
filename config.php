<?php


const DB_HOST ='localhost';
const DB_DATABASE = 'petshop';
const DB_NAME = 'root';
const DB_PASSWORD = 'root';


// Configuracao do PDO
try {
    $pdo = new PDO("mysql:dbname={DB_DATABASE};host={DB_HOST};", DB_NAME, DB_PASSWORD,
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    //code...
} catch (\PDOException $exceptioc) {
    echo "ERRO DATABASE: " . $exceptioc->getMessage();
    exit;
}

