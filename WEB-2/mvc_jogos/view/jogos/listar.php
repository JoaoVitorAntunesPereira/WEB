<?php

include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../../controller/JogoGeneroController.php");
include_once(__DIR__ . "/../../controller/JogoPlataformaController.php");
include_once(__DIR__ . "/../../model/Genero.php");
include_once(__DIR__ . "/../../model/Plataforma.php");

$jogoCont = new JogoController();
$jogos = $jogoCont->listar();

$jogoPlataformaCont = new JogoPlataformaController();

$jogoGeneroCont = new JogoGeneroController();
include_once(__DIR__ . "/../include/header.php");
?>


<h3>Listagem de Jogos</h3>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Data Lançamento</th>
            <th>Desenvolvedor</th>
            <th>Distribuidora</th>
            <th>Classificação Indicativa</th>
            <th>Gêneros</th>
            <th>Plataformas</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <?php foreach ($jogos as $jogo):?>
        <tr>
            <td><?= $jogo->getTitulo()?></td>
            <td><?= $jogo->getDataLancamento()?></td>
            <td><?= $jogo->getDesenvolvedor()?></td>
            <td><?= $jogo->getDistribuidora()?></td>
            <td><?= $jogo->getClassInd()->getDescricao()?></td>
            <td>
                <?php
                    $genero = new Genero();
                    $jogoGeneros = $jogoGeneroCont->listar($jogo->getId());
                    foreach ($jogoGeneros as $genero) {
                        echo $genero->getGenero()->getNome() . ", ";
                    }
                ?>
            </td>
            <td>
                <?php
                    $plataforma = new Plataforma();
                    $jogoPlataformas = $jogoPlataformaCont->listar($jogo->getId());
                    foreach ($jogoPlataformas as $plataforma) {
                        echo $plataforma->getPlataforma()->getNome() . ", ";
                    }
                ?>
            </td>
            <td><a href="excluir.php?id=<?= $jogo->getId()?>">Excluir</a></td>
            <td><a href="editar.php?id=<?= $jogo->getId()?>">Editar</a></td>
        </tr>
    <?php endforeach;?>

</table>

<div>
    <a href="inserir.php" class="btn btn-primary">Inserir novo jogo</a><br>
</div>
<?php require_once(__DIR__ . "/../include/footer.php");