<?php

$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$combust = $_POST['combustivel'];

$combust = ($combust == 'A') ? "Álcool" : (($combust == 'G') ? "Gasolina" : (($combust == 'E' ? "Eletrico" : "Luz"))); 

echo "<h1>Dados informados para o veículo</h1>";
echo "Modelo: " . $modelo . "<br>";
echo "Marca: " . $marca . "<br>";
echo "Combustivel: " . $combust . "<br>";

echo "<br><br>";
echo "<a href = 'ex01_form.html'>Cadastrar outro veículo</a>";