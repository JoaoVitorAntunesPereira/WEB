<?php

include_once(__DIR__ . "/util/config.php");
include_once(__DIR__ . "/service/UsuarioService.php");
include_once(__DIR__ . "/view/include/header.php");



?>

<div class="row mt-3 justify-content-center">
    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto"
                src="https://cdn-icons-png.freepik.com/256/4533/4533718.png?semt=ais_hybrid"
                style="max-width: 200px; height: auto;" />
            <div class="card-body">
                <h5 class="card-title">Jogos</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/jogos/listar.php" 
                        class="card-link">
                        Listagem de Jogos</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
//Inclusão do footer da página
include_once(__DIR__ . "/view/include/footer.php");
?>