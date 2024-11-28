<?php

include_once("Connection.php");

if(!isset($_GET["descricao"]) || ! isset($_GET["unidade_medida"])) {
    echo "Informe os parâmetros GET 'descricao' e 'unidade_medida'!<br>";
    echo "<a href='produto_listar.php'>Voltar</a>";
    exit;
}

$desc = $_GET["descricao"];
$uni_medida = $_GET["unidade_medida"];


$conn = Connection::getConnection();

$sql = "INSERT INTO produtos (descricao, un_medida) VALUE (?, ?)";

$stm = $conn->prepare($sql);
$stm -> execute([$desc, $uni_medida]);


echo "Produto inserido no banco de dados!<br>";
echo "<a href='produto_listar.php'>Voltar</a>";