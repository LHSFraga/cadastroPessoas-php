<?php

//Inicio da conexão com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "usuario";
$port = 3306;

// criar o banco com nome de mateus garantir que vai dar certo


try {
    
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    
