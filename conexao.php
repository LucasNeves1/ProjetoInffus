<?php

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "desafioinffus_db";
$port = "3306";

// criando uma conexão com PDO, pra evitar SQL Injection

try {
    $conn = new PDO("mysql:host=$host;pass=$pass;port=$port;dbname="
        . $dbname, $user, $pass) or die('Erro ao conectar');
} catch (PDOException $e) {
    echo "ERRO :" . $e->getMessage();
    exit;
}
