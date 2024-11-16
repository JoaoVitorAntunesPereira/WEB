<?php

include_once("persistencia.php");

//Array que armazena os livros já salvos no arquivo JSON
$livros = buscarDados("livros.json");

//Verificar se o usuário já submeteu o formulário
if(isset($_POST["titulo"])) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $paginas = $_POST["qtdPag"];
    $autor = $_POST["autor"];

    $id = vsprintf( '%s%s-%s-%s-%s-%s%s%s',
            str_split(bin2hex(random_bytes(16)), 4) ); 

    $livro = array("id" => $id,
                   "titulo" => $titulo,
                   "genero" => $genero,
                   "qtdPag" => $paginas,
                   "autor" => $autor);

    array_push($livros, $livro);
    //Persistência dos dados no arquivo JSON
    salvarDados($livros, "livros.json");

    //Redirecionar para evitar o reenvio do formulário
    header("location: livros.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>
    <h1>Cadastro de livros</h1>
    <h3>Formulário</h3>
    <form method="POST" action="">
        <input type="text" name="titulo" 
            placeholder="Informe o título" >
        <br><br>
        <input type="text" name="autor" 
            placeholder="Informe o autor" >
        <br><br>
        <select name="genero">
            <option value="">---Selecione o gênero----</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="O">Outros</option>
        </select>
        <br><br>
        <input type="number" name="qtdPag" 
            placeholder="Informe a quantidade de páginas" >
        <br><br>
        <button>Cadastrar</button>
    </form>
    <h3>Listagem</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Páginas</th>
            <th>Exclusão</th>
        </tr>

        <!--Dados dos Livros -->

        <?php 
            foreach ($livros as $value): ?>
                <tr>
                    <td><?php echo $value["id"]?></td>
                    <td><?php echo $value["titulo"]?></td>
                    <td><?php echo $value["autor"]?></td>
                    <td>
                        <?php
                            echo $value["genero"] == 'F' ? "Ficção" :
                            ($value["genero"] == 'D' ? "Drama" :
                            ($value["genero"] == 'R' ? "Romance" :
                            ($value["genero"] == 'O' ? "Outros" : "Nenhum")));
                         ?>
                    </td>
                    <td><?php echo $value["qtdPag"]?></td>
                    <td><a href="livros_exc.php?id=<?php echo $value["id"] ?>">excluir</a></td>
                </tr>    
            
        <?php endforeach;?>
    </table>
</body>
</html>