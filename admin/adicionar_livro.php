<?php
require_once('db_connection.php'); // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $isbn = $_POST["isbn"];

    $query = "INSERT INTO livros (titulo, autor, isbn) VALUES (?, ?, ?)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("sss", $titulo, $autor, $isbn);

    if ($stmt->execute()) {
        echo "Livro adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar o livro: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>
