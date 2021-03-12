<?php
require "versession.php";
include "conexao.php";
?>
<!doctype html>
<html lang="pt-BR" class="fixed">
    <head>
        <?php include 'cabecalho.php'; ?>
        <script src="vendor/pace/pace.min.js"></script>
        <link href="vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="vendor/animate.css/animate.css">
        <link rel="stylesheet" href="stylesheets/css/style.css">
        <link rel="stylesheet" href="vendor/data-table/media/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="vendor/data-table/extensions/Responsive/css/responsive.bootstrap.min.css">

        <link href="vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
        <link rel="stylesheet" href="vendor/select2/css/select2-bootstrap.min.css">
    </head>
    <body>
        <div class="wrap">
            <div class="page-header">
                <div class="leftside-header">
                    <?php include 'copright.php' ?>
                    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open"
                         data-target="html">
                        <i class="fa fa-bars" aria-label="Toggle sidebar">
                        </i>
                    </div>
                </div>
                <?php include 'painel_usu.php'; ?>
            </div>
            <div class="page-body">
                <div class="left-sidebar">
                    <!-- left sidebar HEADER -->
                    <div class="left-sidebar-header">
                        <div class="left-sidebar-title">
                            Menu de Navegação
                        </div>
                        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs"
                             data-toggle-class="left-sidebar-collapsed" data-target="html">
                            <span>
                            </span>
                        </div>
                    </div>
                    <?php include 'menu_opc.php'; ?>
                </div>
                <div class="content">
                    <div class="content-header">
                        <div class="leftside-content-header">
                            <ul class="breadcrumbs">
                                <li>
                                    <i class="fa fa-user" aria-hidden="true">
                                    </i>
                                    <a href="cad_usu_comp.php">Cadastro de dados complementares aos Usuários</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form id="inline-validation" action="cad_usu_dados.php" method="post">
                        <div class="row animated fadeInUp">
                            <div class="col-sm-12 col-md-6">
                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">                   
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Selecione o usuário na lista:</label>
                                                    <select name="tkusr" id="select2-example-basic" class="form-control" style="width: 100%" required>
                                                        <?php
                                                        $pdo = conectar("membros");
                                                        $consulta = $pdo->prepare("SELECT * FROM usuarios WHERE userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
                                                        $consulta->execute();
                                                        echo("<optgroup label='Usuários'>");
                                                        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            $idpgrad = $reg['idpgrad'];
                                                            $pgrad = $pdo->prepare("SELECT * FROM postograd");
                                                            $pgrad->execute();
                                                            while ($linha = $pgrad->fetch(PDO::FETCH_ASSOC)):
                                                                if ($linha['id'] == $idpgrad) {
                                                                    echo("<option value=" . base64_encode($reg['id']) . ">" . $linha['pgradsimples'] . "  - " . $reg['nomecompleto'] . " (".$reg['nomeguerra'].")</option>");
                                                                }
                                                            endwhile;
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="panel-content">                                        
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">
                                                            Confirmar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </form>
                </div>
                <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
            </div>
        </div>
        <script src="vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/nano-scroller/nano-scroller.js"></script>
        <script src="javascripts/template-script.min.js"></script>
        <script src="javascripts/template-init.min.js"></script>
        <script src="vendor/bootstrap_max-lenght/bootstrap-maxlength.js"></script>
        <script src="vendor/select2/js/select2.min.js"></script>
        <script src="vendor/input-masked/inputmask.bundle.min.js"></script>
        <script src="vendor/input-masked/phone-codes/phone.js"></script>
        <script src="vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap_time-picker/js/bootstrap-timepicker.js"></script>
        <script src="vendor/bootstrap_color-picker/js/bootstrap-colorpicker.min.js"></script>
        <script src="javascripts/examples/forms/advanced.js"></script>
        <script src="javascripts/examples/forms/validation.js"></script>

        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

        <script src="vendor/data-table/media/js/jquery.dataTables.min.js"></script>
        <script src="vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
        <script src="vendor/data-table/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="vendor/data-table/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
        <script src="javascripts/examples/tables/data-tables.js"></script>


    </body>

</html>