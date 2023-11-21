<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $isbn = $_POST["isbn"];

    $query = "INSERT INTO livros (titulo, autor, isbn) VALUES ('$titulo', '$autor', '$isbn')";

    if ($connection->query($query) === TRUE) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o livro: " . $connection->error;
    }

    $connection->close();
}
?>
