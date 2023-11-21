<!DOCTYPE html>
<html>
<head>

    <title>Página de Login</title>
    <script>
        function exibirPopup(mensagem) {
            alert(mensagem);
        }
    </script>
</head>
<body>
    <h1>Login</h1>
    <form action="autenticar.php" method="post">
        Email: <input type="text" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        Tipo:
        <select name="tipo">
            <option value="aluno">Aluno</option>
            <option value="funcionario">Funcionário</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($_GET['erro'])) {
        echo "<script>exibirPopup('Credenciais inválidas. Tente novamente.');</script>";
    }
    ?>
</body>
</html>
