<?php


include_once(__DIR__ . "/../../controller/PlataformaController.php");
include_once(__DIR__ . "/../../controller/GeneroController.php");

$plataformaCont = new PlataformaController();
$plataformas = $plataformaCont->listar();

$generoCont = new GeneroController();
$generos = $generoCont->listar();

foreach ($plataformas as $value) {
    echo $value->getId();
}
?>

<h2>Formulário Jogo</h2>

<form action="formJogo" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="">
    </div>
    <div>
        <label for="data_lancamento">Data Lançamento</label>
        <input type="datetime" name="data_lancamento" id="data_lancamento">
    </div>
    <div>
        <label for="produtor">Produtor</label>
        <input type="text" name="produtor" id="produtor">
    </div>
    <div>
        <label for="distribuidora">Distribuidora</label>
        <input type="text" name="distribuidora" id="distribuidora">
    </div>
    <div>
        <label for="generos">Gênero</label>
        <select name="generos" id="generos">
            <option value="">--Selecione--</option>
            <?php
                foreach ($generos as $value) {
                    echo "<option value='".$value->getId()."'>".$value->getNome()."</option>"; 
                }
            ?>
        </select>
    </div>
    <div>
        <label for="plataformas[]">Plataformas</label><br>
        <?php foreach ($plataformas as $value): ?>
            <label>
            <input type="checkbox" name="plataformas[]" value="<?=$value->getId()?>">
            <?=$value->getNome()?>
            </label><br>
        <?php endforeach; ?>
    </div>
</form>









<?php require_once(__DIR__ . "/../include/header.php");

?>