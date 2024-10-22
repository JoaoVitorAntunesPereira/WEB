<?php 

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num3 = $_GET['num3'];

echo "Média de ".$num1." e ".$num2." e ".$num3." por GET: ".(($num1+$num2+$num3)/3)."<br>";

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];

echo "Média de ".$num1." e ".$num2." e ".$num3." por POST: ".(($num1+$num2+$num3)/3)."<br>";
