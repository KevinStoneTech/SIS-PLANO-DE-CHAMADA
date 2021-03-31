<?php
require "versession.php";
include "conexao.php";
$p1 = conectar("membros");
$sistema = base64_encode($_SESSION['sistema']);
$idmembro = $_SESSION['user_id'];
$dados = $p1->prepare("SELECT * FROM logins WHERE sistema = '$sistema' AND idmembro = '$idmembro'");
$dados->execute();
$conta = $dados->rowCount();
$dados2 = $p1->prepare("SELECT * FROM usuarios WHERE userativo = 'S'");
$dados2->execute();
$conta2 = $dados2->rowCount();
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
        <link rel="stylesheet" href="vendor/toastr/toastr.min.css">
        <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="stylesheets/css/style.css">
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
                                    <i class="fa fa-road" aria-hidden="true">
                                    </i>
                                    <a href="index.php">Página inicial do Sistema de Plano de Chamadas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row animated fadeInUp">
                        <div class="col-sm-12 col-lg-9">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="panel widgetbox wbox-2 bg-scale-0">
                                        <a href="#">
                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <span class="icon fa fa-globe color-darker-1"></span>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h4 class="subtitle color-darker-1">Acessos</h4>
                                                        <h1 class="title color-primary"> <?php echo($conta); ?></h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                                        <a href="#">
                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <span class="icon fa fa-user color-darker-2"></span>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h4 class="subtitle color-darker-2">Usuários Cadastrados</h4>
                                                        <h1 class="title color-w"> <?php echo($conta2); ?></h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3">
                            <div class="timeline">
                                <div class="timeline-box">
                                    <div class="timeline-icon bg-primary">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h4 class="tl-title">Suporte</h4>Seção de Tecnologia da Informação 12º GAAAe Sl
                                    </div>
                                    <div class="timeline-footer">
                                        <span>STI - informatica@12gaaaesl.eb.mil.br</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
            </div>
        </div>
        <script src="vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/nano-scroller/nano-scroller.js"></script>
        <script src="javascripts/template-script.min.js"></script>
        <script src="javascripts/template-init.min.js"></script>
        <script src="vendor/toastr/toastr.min.js"></script>
        <script src="vendor/chart-js/chart.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="javascripts/examples/dashboard.js"></script>
    </body>
</html>
