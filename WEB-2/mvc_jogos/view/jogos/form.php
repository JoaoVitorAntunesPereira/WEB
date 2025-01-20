<?php


include_once(__DIR__ . "/../../controller/PlataformaController.php");
include_once(__DIR__ . "/../../controller/GeneroController.php");
include_once(__DIR__ . "/../../controller/ClassificacaoIndicativaController.php");






$plataformaCont = new PlataformaController();
$plataformas = $plataformaCont->listar();

$generoCont = new GeneroController();
$generos = $generoCont->listar();

$classIndCont = new ClassificacaoIndicativaController();
$classIndArray = $classIndCont->listar();

include_once(__DIR__ . "/../include/header.php");
?>

<?php if($msgErro): ?>
    <div id="msgErro" style="color: red;">
        <?= $msgErro ?>
    </div>
<?php endif; ?>

<h2>Formulário Jogo</h2>

<form action="" method="post">
    <div style="margin:10px;">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php if($jogoObj) echo $jogoObj->getTitulo()?>">
    </div>
    <div style="margin:10px;">
        <label for="data_lancamento">Data Lançamento</label>
        <input type="date" name="data_lancamento" id="data_lancamento" value="<?php if($jogoObj) echo $jogoObj->getDataLancamento()?>">
    </div>
    <div style="margin:10px;">
        <label for="desenvolvedor">Desenvolvedor</label>
        <input type="text" name="desenvolvedor" id="desenvolvedor" value="<?php if($jogoObj) echo $jogoObj->getDesenvolvedor()?>">
    </div>
    <div style="margin:10px;">
        <label for="distribuidora">Distribuidora</label>
        <input type="text" name="distribuidora" id="distribuidora" value="<?php if($jogoObj) echo $jogoObj->getDistribuidora()?>">
    </div>
    <div>
        <label for="class-indicativa">Classificação Indicativa</label>
        <select name="class-indicativa" id="class-indicativa">
            <option value="">--Selecione--</option>
            <?php foreach ($classIndArray as $value):?>
                <option value="<?=$value->getId()?>"
                    <?= ($jogoObj && $jogoObj->getClassInd() && $jogoObj->getClassInd()->getId() == $value->getId() ? "selected" : "" )?>><?=$value->getDescricao()?></option>
                
            <?php endforeach; ?>
        </select>
    </div>
    <div style="display: flex;">
        <div style="margin:10px;">
            <label for="generos[]">Gêneros</label><br>
            <?php foreach ($generos as $value): ?>
                <label>
                    <input type="checkbox" name="generos[]" class="checkbox-generos" value="<?=$value->getId()?>"
                        <?php 
                        if($vetJogoGenero) {
                            foreach($vetJogoGenero as $jogoGenero) {
                                if($jogoGenero->getGenero()->getId() == $value->getId()) {
                                    echo "checked";
                                    break;
                                }
                            }
                        }
                        ?>
                    >
                    <?=$value->getNome()?>
                </label><br>
            <?php endforeach; ?>

        </div>
        <div style="margin:10px;">
            <label for="plataformas[]">Plataformas</label><br>
            <?php foreach ($plataformas as $value): ?>
                <label>
                <input type="checkbox" name="plataformas[]"class="checkbox-plataformas" value="<?=$value->getId()?>"
                <?php
                    if($vetJogoPlataforma){
                        foreach ($vetJogoPlataforma as $jogoPlataforma) {
                            if($jogoPlataforma->getPlataforma()->getId() == $value->getId()){
                                echo "checked";
                                break;
                            }
                        }
                    }
                ?>
                >
                <?=$value->getNome()?>
                </label><br>
            <?php endforeach; ?>
        </div>
    </div>
    <button type="submit">Enviar</button>
</form>







<script src="../../service/checkboxes.js"></script>
<?php 
require_once(__DIR__ . "/../include/footer.php");

?>