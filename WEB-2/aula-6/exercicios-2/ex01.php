<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ex01.php" method="post">
        <input type="text" name="num1" placeholder="Informe o primeiro número">
        <br>
        <input type="text" name="num2" placeholder="Informe o segundo número">
        <br>
        <select name="opr">
            <option value="">--Informe a operação--</option>
            <option value="+">Soma</option>
            <option value="-">Subtração</option>
            <option value="*">Multiplicação</option>
            <option value="/">Divisão</option>
        </select>
        <br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>

<?php
    $num1;
    $num2;
    $opr;

    if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['opr'])){
        $num1 = floatval($_POST['num1']);
        $num2 = floatval($_POST['num2']);
        $opr = $_POST['opr'];
        if($num1 == NULL && $num1 != 0){
            echo "Informe o primeiro número!<br>";
        }
        if($num2 == NULL && $num2 != 0){
            echo "Informe o segundo número<br>";
        }
        if($opr == NULL){
            echo "Informe a operação<br>";
        }
        if($num1 != NULL && ($num2 != NULL || $num2 == 0) && $opr != NULL){
            echo $num1.$opr.$num2."=".calcular($num1, $num2, $opr);
        }
    
    }


    function calcular($num1, $num2, $opr){
        if($opr == '+'){
            return $num1 + $num2;
        }else if($opr == '-'){
            return $num1 - $num2;
        }else if($opr == '*'){
            return $num1 * $num2;
        }else if($opr == '/'){
            if($num2 == 0){
                echo "Erro! Divisão por zero.<br>";
                return "NAN";
            }else{
                return $num1 / $num2;
            }
        }
    }
?>