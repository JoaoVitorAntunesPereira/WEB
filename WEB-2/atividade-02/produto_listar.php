<?php

include_once("Connection.php");

$conn = Connection::getConnection();

$sql = "SELECT id, descricao, un_medida FROM produtos";

$stm = $conn->prepare($sql);
$stm->execute();
$produtos = $stm->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Unidade de Medida</th>
            <th>EXCLUSÃO</th>
        </tr>
        <?php foreach ($produtos as $value):?>
            <tr>
                <td><?= $value["id"] ?></td>
                <td><?= $value["descricao"]?></td>
                <td><?= $value["un_medida"]?></td>
                <td><a href="produto_excluir.php?id=<?=$value["id"]?>">excluir</a></td>
            </tr>
         <?php endforeach;?>   
    </table>
</body>
</html>


