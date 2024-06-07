<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "1234"; // Defina a senha correta para o usuário root
$dbname = "projeto";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
