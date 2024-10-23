<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ex03_form.php" method="post">
        <input type="text" name="login" placeholder="Informe o login">
        <input type="password" name="senha" placeholder="Informe a senha">
        <button type="submit">Logar</button>
    </form>
</body>
</html>

<?php
// Inicializando as variáveis
$login;
$senha;

// Verificando se os dados foram enviados via POST
if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (strtolower($login) == "ifpr" && strtolower($senha) == "tads") {
        echo "<h1>Bem vindo TADS!</h1>";
        echo "<style>form{display: none}</style>";
    }
}
?>
