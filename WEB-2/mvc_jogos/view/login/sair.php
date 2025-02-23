<?php

include_once(__DIR__ . "/../../controller/UsuarioController.php");

$usuarioController = new UsuarioController();

$usuarioController->deslogar();
header("location: " . BASE_URL . "/view/login/login.php");