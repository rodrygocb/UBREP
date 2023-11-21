<?php
$host = "localhost"; // Endereço do servidor do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "bd_biblioteca"; // Nome do banco de dados

// Cria uma conexão com o banco de dados
$connection = new mysqli($host, $username, $password, $database);

// Verifica se ocorreu algum erro na conexão
if ($connection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
}

// Define o conjunto de caracteres para utf8 (opcional)
$connection->set_charset("utf8");

// Agora você pode usar a variável $connection para executar consultas no banco de dados
?>
