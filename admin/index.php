<?php
require_once('../db_connection.php'); // Inclua o arquivo de conexão com o banco de dados

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adicionar_livro'])) {
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $isbn = $_POST["isbn"];

        $query = "INSERT INTO livros (titulo, autor, isbn) VALUES (?, ?, ?)";

        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss", $titulo, $autor, $isbn);

        if ($stmt->execute()) {
            $mensagem = "Livro adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar o livro: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['adicionar_usuario'])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $tipo = $_POST["tipo"];

        $query = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";

        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $nome, $email, $senha, $tipo);

        if ($stmt->execute()) {
            $mensagem = "Usuário adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar o usuário: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel de Administração</title>
</head>
<body>
    <h1>Painel de Administração</h1>

    <!-- Formulário para Adicionar Livros -->
    <h2>Adicionar Livro</h2>
    <form action="" method="post">
        Título: <input type="text" name="titulo"><br>
        Autor: <input type="text" name="autor"><br>
        ISBN: <input type="text" name="isbn"><br>
        <input type="submit" name="adicionar_livro" value="Adicionar Livro">
    </form>

    <!-- Formulário para Adicionar Usuários -->
    <h2>Adicionar Usuário</h2>
    <form action="" method="post">
        Nome: <input type="text" name="nome"><br>
        Email: <input type="text" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        Tipo:
        <select name="tipo">
            <option value="aluno">Aluno</option>
            <option value="funcionario">Funcionário</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" name="adicionar_usuario" value="Adicionar Usuário">
    </form>

    <?php
    if (!empty($mensagem)) {
        echo "<p>$mensagem</p>";
    }
    ?>
</body>
</html>
