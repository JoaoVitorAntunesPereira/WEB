<?php 

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

echo "Soma de ".$num1." e ".$num2." por GET: ".($num1+$num2)."<br>";

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];

echo "Soma de ".$num1." e ".$num2." por POST: ".($num1+$num2)."<br>";
