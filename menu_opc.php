<div id="left-nav" class="nano">
    <div class="nano-content">
        <nav>
            <ul class="nav" id="main-nav">
                <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Página Principal</span></a></li>
                <!-- Essa linha deve ser inserida se o item do menu for correspondente ao que está aberto
                <li class="has-child-item open-item active-item">
                -->
                <li class="has-child-item close-item">
                    <a><i class="fa fa-user" aria-hidden="true"></i><span>Usuários</span></a>
                    <ul class="nav child-nav level-1">                        
                        <?php
                        if ($_SESSION['user_numconta'] == "2" || $_SESSION['user_numconta'] == "3") {
                            ?>
                            <li><a href="cad_usu.php">Cadastro</a></li>
                            <li><a href="cad_usu_comp.php">Cadastro complementar</a></li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="filtrorelat.php">Relatórios</a>                            
                        </li>
                    </ul>
                </li>
                <?php
                if ($_SESSION['user_numconta'] == "3") {
                    ?>
                    <li><a href="cad_bairro.php"><i class="fa fa-codepen" aria-hidden="true"></i><span>Bairros</span></a></li>
                    <li><a href="cad_setor.php"><i class="fa fa-road" aria-hidden="true"></i><span>Setores</span></a></li>
                    <li><a href="cad_subunid.php"><i class="fa fa-sitemap" aria-hidden="true"></i><span>Subunidade</span></a></li>
                    <li><a href="cad_pgrad.php"><i class="fa fa-mortar-board" aria-hidden="true"></i><span>Posto / Graduação</span></a></li>
                                <?php
                            }
                            ?>
            </ul>
        </nav>
    </div>
</div>
