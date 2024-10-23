<?php

$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$combust = $_POST['combustivel'];

echo "<h1>Dados informados para o veículo</h1>";
echo "Modelo: " . $modelo . "<br>";
echo "Marca: " . $marca . "<br>";
echo "Combustivel: " . $combust . "<br>";

echo "<br><br>";
echo "<a href = 'veiculo_form.php'>Cadastrar outro veículo</a>";