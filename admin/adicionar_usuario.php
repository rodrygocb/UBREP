<?php
require_once('db_connection.php'); // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];

    $query = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssss", $nome, $email, $senha, $tipo);

    if ($stmt->execute()) {
        echo "Usuário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar o usuário: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>
