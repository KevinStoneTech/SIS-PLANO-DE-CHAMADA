<?php
require "versession.php";
include "conexao.php";
$pdo_u = conectar("membros");
$idusuario = filter_input(INPUT_POST, "usuario");
$consulta2 = $pdo_u->prepare("SELECT * FROM usuarios WHERE id = '$idusuario'");
$consulta2->execute();
while ($reg_usu = $consulta2->fetch(PDO::FETCH_ASSOC)) :
    /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
    /* Nessa parte ele pega o dado recebido e procura no banco de dados a informação */
    $nomecompleto = $reg_usu["nomecompleto"]; //
    $nomeguerra = $reg_usu["nomeguerra"]; //
    $idpgrad = $reg_usu["idpgrad"]; //
    $endereco = $reg_usu["endereco"]; //
    $bairro = $reg_usu["bairro"]; //
    $cidade = $reg_usu["cidade"]; //
    $estado = $reg_usu["estado"]; //
    $idsubunidade = $reg_usu["idsubunidade"]; //
    $email = $reg_usu["email"];
    $fixo = $reg_usu["fixo"]; //
    $celular = $reg_usu["celular"]; //
    $identidade = base64_decode($reg_usu["identidade"]); //
    $datanascimento = $reg_usu["datanascimento"]; //
    $senha = base64_decode($reg_usu["senha"]);
    $acessorancho = $reg_usu["acessorancho"];
    $contarancho = $reg_usu["contarancho"];
    $acessocaveira = $reg_usu["acessocaveira"];
    $contacaveira = $reg_usu["contacaveira"];
    $acessoservico = $reg_usu["acessoservico"];
    $contaservico = $reg_usu["contaservico"];
    $acessopchamada = $reg_usu["acessopchamada"];
    $contapchamada = $reg_usu["contapchamada"];
    $userativo = $reg_usu["userativo"];
endwhile;
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
                    <form id="inline-validation" action="ver_usu.php">
                        <div class="row animated fadeInUp">
                            <div class="col-sm-12 col-md-6">
                                <div class="panel">
                                    <div class="panel-header  panel-warning">
                                        <h3 class="panel-title">Dados padrão do usuário</h3>
                                        <div class="panel-actions">
                                            <ul>
                                                <li class="action toggle-panel panel-expand"><span></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">                                    
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Nome completo do Usuário:</label>
                                                    <input type="text" class="form-control" value="<?php echo($nomecompleto); ?>" id="inputMaxLength" name="nome" placeholder="Nome Completo" maxlength="100" required="Campo obrigatório" disabled="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Nome de Guerra:</label>
                                                    <input type="text" class="form-control" id="inputMaxLength2" name="guerra" value="<?php echo($nomeguerra); ?>" placeholder="Nome de Guerra" maxlength="50" required="Campo obrigatório" disabled="">
                                                </div>                                        
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Posto/Graduação:</label>
                                                    <select name="pgrad" id="select2-example-basic" class="form-control" style="width: 100%" disabled="">
                                                        <?php
                                                        $pdo6 = conectar("membros");
                                                        $consulta6 = $pdo6->prepare("SELECT * FROM postograd");
                                                        $consulta6->execute();
                                                        echo("<optgroup label='Posto Graduação'>");
                                                        while ($reg = $consulta6->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            if ($reg['id'] == $idpgrad) {
                                                                echo("<option selected value=" . $reg['id'] .">" . $reg['postograd'] . "</option>");
                                                            } else {
                                                                echo("<option value=" . $reg['id'] .">" . $reg['postograd'] . "</option>");
                                                            }
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Endereço:</label>
                                                    <input type="text" class="form-control" value="<?php echo($endereco); ?>" id="inputMaxLength3" name="endereco" placeholder="Endereço" maxlength="100" required="Campo obrigatório" disabled="">                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Bairro:</label>
                                                    <select name="bairro" id="select2-example-basic2" class="form-control" style="width: 100%" disabled="">
                                                        <?php
                                                        $pdo2 = conectar("membros");
                                                        $consulta = $pdo2->prepare("SELECT * FROM bairros");
                                                        $consulta->execute();
                                                        echo("<optgroup label='Bairros'>");
                                                        while ($reg2 = $consulta->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            if ($reg2['id'] == $bairro) {
                                                                echo("<option selected value=" . $reg2['id'] . ">" . $reg2['bairro'] . "</option>");
                                                            } else {
                                                                echo("<option value=" . $reg2['id'] . ">" . $reg2['bairro'] . "</option>");
                                                            }
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Cidade:</label>
                                                    <input type="text" class="form-control" value="<?php echo($cidade); ?>" id="inputMaxLength4" name="cidade" value="Cáceres" placeholder="Cidade" maxlength="100" required="Campo obrigatório" disabled="">                                            
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="inputMaxLength" class="control-label">Estado:</label>
                                                        <input type="text" class="form-control" value="<?php echo($estado); ?>" id="inputMaxLength6" name="estado" value="Mato Grosso" placeholder="Estado" maxlength="100" required="Campo obrigatório" disabled="">                                            
                                                    </div>                                         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-header panel-warning">
                                        <h3 class="panel-title">Dados padrão do usuário</h3>
                                        <div class="panel-actions">
                                            <ul>
                                                <li class="action toggle-panel panel-expand"><span></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Subunidade:</label>
                                                    <select name="subunidade" id="select2-example-basic4" class="form-control" style="width: 100%" disabled="">
                                                        <?php
                                                        $pdox = conectar("membros");
                                                        $consultax = $pdox->prepare("SELECT * FROM subunidade");
                                                        $consultax->execute();
                                                        echo("<optgroup label='Subunidade'>");
                                                        while ($regx = $consultax->fetch(PDO::FETCH_ASSOC)) :
                                                            /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                                                            if ($regx['id'] == $idsubunidade) {
                                                                echo("<option selected value=" . $regx['id'] . ">" . $regx['descricao'] . "</option>");
                                                            } else {
                                                                echo("<option value=" . $regx['id'] . ">" . $regx['descricao'] . "</option>");
                                                            }
                                                        endwhile;
                                                        echo("</optgroup>");
                                                        ?>
                                                    </select>                                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMaxLength" class="control-label">Email:</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="email" class="form-control" value="<?php echo($email); ?>" id="inputMaxLength5" name="email" placeholder="Email" maxlength="100" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefone Fixo</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" class="form-control" value="<?php echo($fixo); ?>" value="(65)" name="fonefixo" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefone Celular</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" class="form-control" value="<?php echo($celular); ?>" value="(65)" name="fonecelular" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Identidade: (Apenas números)</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                                                        <input type="text" class="form-control" value="<?php echo($identidade); ?>" name="identidade" placeholder="Identidade - Apenas números" disabled="">                                                        
                                                    </div>
                                                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Essa informação será <span class="code">CRIPTOGRAFADA</span></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Data de nascimento:</label>
                                                    <div class="input-group mb-sm">
                                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                        <input type="text" class="form-control" id="date-mask" value="<?php echo($datanascimento); ?>" name="datanascimento" placeholder="DD/MM/AAAA" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>ID de usuário:</label>
                                                    <div class="input-group mb-sm">
                                                        <input type="number" class="form-control" value="<?php echo($idusuario); ?>" name="idusuario" disabled="Campo não editável">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="row animated fadeInUp">
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-content">                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Ok. Estou Satisfeito!
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