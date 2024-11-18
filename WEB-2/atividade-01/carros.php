<?php

include_once("persistencia.php");

$carros = buscarDados("carros.json");

$msgErro = "";
$marca = "";
$modelo = "";
$cor = "";
$tipo = "";
$combustivel = "";

if(isset($_POST["marca"])){
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $cor = $_POST["cor"];
    $tipo = $_POST["tipo"];
    $combustivel = $_POST["combustivel"];

    $mensagem = array();

    if(trim($marca) == ""){
        array_push($mensagem, "Informe a marca");
    }
    if(trim($modelo) == ""){
        array_push($mensagem, "Informe o modelo");
    }
    if(trim($cor) == ""){
        array_push($mensagem, "Informe a cor");
    }
    if(trim($tipo) == ""){
        array_push($mensagem, "Informe o tipo");
    }
    if(trim($combustivel) == ""){
        array_push($mensagem, "Informe o tipo combustivel");
    }

    if(!$mensagem){
        $id = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

        $carro = array("id" => $id,
                       "marca" => $marca,
                       "modelo" => $modelo,
                       "cor" => $cor,
                       "tipo" => $tipo,
                       "combustivel" => $combustivel);
    
        array_push($carros, $carro);
        
        salvarDados($carros, "carros.json");

        header("location: carros.php");
    }else{
        $msgErro = implode("<br>", $mensagem);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
</head>
<body>
    <h1>Cadastro de carros</h1>

    <h3>Formulário</h3>
    <form action="" method="post">
        <input type="text" name="marca" id="marca" placeholder="Informe a marca" value = "<?php echo $marca?>">
        <br><br>
        <input type="text" name="modelo" id="modelo" placeholder="Informe o modelo" value = "<?php echo $modelo?>">
        <br><br>
        <input type="text" name="cor" id="cor" placeholder="Informe a cor" value = "<?php echo $cor?>">
        <br></br>
        <input type="text" name="tipo" id="tipo" placeholder="Informe o tipo do veículo" value = "<?php echo $tipo?>">
        <br><br>
        <select id="combustivel" name="combustivel">
            <option value="">Selecione o combustível</option>
            <option value="gasolina" <?php echo($combustivel == "gasolina" ? "selected" : "")?> >Gasolina</option>
            <option value="etanol" <?php echo($combustivel == "etanol" ? "selected" : "")?> >Álcool (Etanol)</option>
            <option value="diesel" <?php echo($combustivel == "diesel" ? "selected" : "")?> >Diesel</option>
            <option value="flex" <?php echo($combustivel == "flex" ? "selected" : "")?> >Flex (Gasolina/Álcool)</option>
            <option value="eletrico" <?php echo($combustivel == "eletrico" ? "selected" : "")?> >Elétrico</option>
            <option value="hibrido" <?php echo($combustivel == "hibrido" ? "selected" : "")?> >Híbrido</option>
            <option value="gnv" <?php echo($combustivel == "gnv" ? "selected" : "")?> >GNV (Gás Natural Veicular)</option>
        </select>
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <div id="divErro" style="color: red;">
        <?php echo $msgErro; ?>    
    </div>

    <h3>Carros cadastrado</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Tipo</th>
            <th>Combustivel</th>
            <th>Exclusão</th>
        </tr>
        <?php 
            $dados = buscarDados("carros.json");

            foreach ($dados as $key => $value) {
                echo "<tr>";
                    echo "<td>" . $value["id"] . "</td>";
                    echo "<td>" . $value["marca"] . "</td>";
                    echo "<td>" . $value["modelo"] . "</td>";
                    echo "<td>" . $value["cor"] . "</td>";
                    echo "<td>" . $value["tipo"] . "</td>";
                    echo "<td>" . $value["combustivel"] . "</td>";
                    echo "<td> <a href='carros_exc.php?id=".$value["id"] . "'>excluir</a> </td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>