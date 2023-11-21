<?php
require_once('db_connection.php'); // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];

    $query = "SELECT id, nome FROM usuarios WHERE email = ? AND senha = ? AND tipo = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("sss", $email, $senha, $tipo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome);
        $stmt->fetch();

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;

        $stmt->close();
        $connection->close();

        // Redirecionar com base no tipo de usuário
        if ($tipo == 'aluno') {
            header("Location: aluno.php");
        } elseif ($tipo == 'funcionario') {
            header("Location: funcionario.php");
        } elseif ($tipo == 'admin') {
            header("Location: admin.php");
        }
    } else {
        header("Location: login.php?erro=true");
    }
}
?>
