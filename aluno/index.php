<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa de Livros</title>
</head>
<body>
    <h1>Pesquisa de Livros</h1>
    <form action="pesquisar_livro.php" method="get">
        Pesquisar Livro: <input type="text" name="q">
        <input type="submit" value="Pesquisar">
    </form>

   <?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["q"])) {
        $query = '%' . $_GET["q"] . '%';

        $sql = "SELECT * FROM livros WHERE titulo LIKE ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Título: " . htmlspecialchars($row["titulo"]) . "<br>";
                echo "Autor: " . htmlspecialchars($row["autor"]) . "<br>";
                echo "ISBN: " . htmlspecialchars($row["isbn"]) . "<br><br>";
            }
        } else {
            echo "Nenhum livro encontrado.";
        }

        $stmt->close();
    } else {
        echo "Nenhum termo de pesquisa especificado.";
    }
}

$connection->close();
?>


</body>
</html>
