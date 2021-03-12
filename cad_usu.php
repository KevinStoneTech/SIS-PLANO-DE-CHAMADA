<?php
require "versession.php";
include "conexao.php";
include "camposusu.php";
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
                                    <a href="cad_usu.php">Cadastro de Usuários</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form id="inline-validation" action="conf_usu.php" method="post">
                        <div class="row animated fadeInUp">
                            <div class="col-sm-12 col-md-6">
                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">                                    
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Nome completo do Usuário:</label>
                                                    <input type="text" class="form-control" id="inputMaxLength" name="<?php echo($campo[1]); ?>" placeholder="Nome Completo" maxlength="100" required="Campo obrigatório">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Nome de Guerra:</label>
                                                    <input type="text" class="form-control" id="inputMaxLength2" name="<?php echo($campo[2]); ?>" placeholder="Nome de Guerra" maxlength="50" required="Campo obrigatório">
                                                </div>                                        
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Posto/Graduação:</label>
                                                    <select name="<?php echo($campo[3]); ?>" id="select2-example-basic" class="form-control" style="width: 100%">
                                                        <?php
                                                        $pdo = conectar("membros");
                                                        $consulta = $pdo->prepare("SELECT * FROM postograd");
                                                        $consulta->execute();
                                                        echo("<optgroup label='Posto Graduação'>");
                                                        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            echo("<option value=" . $reg['id'] . "label=" . $reg['pgradsimples'] . ">" . $reg['postograd'] . "</option>");
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Endereço:</label>
                                                    <input type="text" class="form-control" id="inputMaxLength3" name="<?php echo($campo[4]); ?>" placeholder="Endereço" maxlength="100" required="Campo obrigatório">                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Bairro:</label>
                                                    <select name="<?php echo($campo[5]); ?>" id="select2-example-basic2" class="form-control" style="width: 100%">
                                                        <?php
                                                        $pdo2 = conectar("membros");
                                                        $consulta = $pdo2->prepare("SELECT * FROM bairros ORDER BY bairro ASC");
                                                        $consulta->execute();
                                                        echo("<optgroup label='Bairros'>");
                                                        while ($reg2 = $consulta->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            echo("<option value=" . $reg2['id'] . ">" . $reg2['bairro'] . "</option>");
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Cidade:</label>
                                                    <input type="text" class="form-control" id="inputMaxLength4" name="<?php echo($campo[6]); ?>" value="Manaus" placeholder="Cidade" maxlength="100" required="Campo obrigatório">                                            
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="inputMaxLength" class="control-label">Estado:</label>
                                                        <input type="text" class="form-control" id="inputMaxLength6" name="<?php echo($campo[7]); ?>" value="Amazonas" placeholder="Estado" maxlength="100" required="Campo obrigatório">                                            
                                                    </div>                                         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Subunidade:</label>
                                                    <select name="<?php echo($campo[8]); ?>" id="select2-example-basic4" class="form-control" style="width: 100%">
                                                        <?php
                                                        $pdo4 = conectar("membros");
                                                        $consulta = $pdo4->prepare("SELECT * FROM subunidade");
                                                        $consulta->execute();
                                                        echo("<optgroup label='Subunidade'>");
                                                        while ($reg4 = $consulta->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            echo("<option value=" . $reg4['id'] . ">" . $reg4['descricao'] . "</option>");
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Email:</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="<?php echo($campo[9]); ?>" class="form-control" id="inputMaxLength5" name="email" placeholder="Email" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone-mask">Telefone Fixo</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" class="form-control"  value="(92) " name="<?php echo($campo[10]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone-mask">Telefone Celular</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" class="form-control"  value="(92) " name="<?php echo($campo[11]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone-mask">Identidade: (Apenas números)</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                                                        <input type="text" class="form-control" name="<?php echo($campo[12]); ?>" placeholder="Identidade - Apenas números" required="Preenchimento obrigatório">                                                        
                                                    </div>
                                                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Essa informação será <span class="code">CRIPTOGRAFADA</span></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone-mask">Data de nascimento:</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                        <input type="text" class="form-control" id="date-mask" name="<?php echo($campo[13]); ?>" placeholder="DD/MM/AAAA">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
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
