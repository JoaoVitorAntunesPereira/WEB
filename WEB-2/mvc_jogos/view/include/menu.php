<nav class="navbar navbar-expand-md bg-success px-3">
    <a class="navbar-brand" href="#">Cadastro de Jogos</a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#"
                id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" 
                    href="<?=BASE_URL?>/view/jogos/listar.php">Jogos</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#"
                id="navDropDown" data-bs-toggle="dropdown"><?php if($_SESSION['USUARIO_NOME'] != null){
                                                                echo $_SESSION['USUARIO_NOME'];
                                                            }else{
                                                                echo "Usuário";
                                                            }?></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" 
                    href="<?=BASE_URL?>/view/login/sair.php">Sair</a>
            </div>
        </li>
    </ul>
</nav>