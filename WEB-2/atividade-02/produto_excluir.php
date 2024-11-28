<?php

include_once("Connection.php");

$conn = Connection::getConnection();

$id = 0;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(! $id) {
    echo "<p>ID inválido</p>";
    echo "<a href='time_listar.php'>Voltar</a>";
    exit;
}


$sql = "DELETE FROM produtos WHERE id = ?";

$stm = $conn->prepare($sql);
$stm -> execute([$id]);

echo "<p>Produto excluído com sucesso</p>";
echo "<a href='produto_listar.php>Voltar</a>";

header("location:produto_listar.php");