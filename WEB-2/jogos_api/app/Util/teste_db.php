<?php
$host = "localhost";
$port = "3309";
$dbname = "mysql";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexão bem-sucedida ao banco $dbname!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}

?>
