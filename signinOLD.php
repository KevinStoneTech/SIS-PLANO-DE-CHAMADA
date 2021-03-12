<?php
session_start();
$sistema = base64_encode("SISTEMA PLANO DE CHAMADAS");
$_SESSION['sistema'] = base64_decode($sistema);
$token = base64_decode(filter_input(INPUT_GET, "token"));
?>
<!doctype html>
<html lang="pt-BR" class="fixed accounts sign-in">

    <head>
        <?php include 'cabecalho.php'; ?>    
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="vendor/animate.css/animate.css">
        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--TEMPLATE css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="stylesheets/css/style.css">
    </head>

    <body>
        <div class="wrap">
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body animated slideInDown">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--LOGO-->
                <div class="logo text-center">
                    <h1>SISTEMA PLANO DE CHAMADA</h1>
                </div>
                <div class="box">
                    <!--SIGN IN FORM-->
                    <div class="panel mb-none">
                        <div class="panel-content bg-scale-0">
                            <?php
                            if ($token <> "") {
                                ?>
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong><?php echo($token); ?></strong>
                                </div>
                                <?php
                                $token = "";
                            }
                            ?>
                            <form id="inline-validation" action="chkpass.php" method="post">
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" name="login" class="form-control" placeholder="Login de acesso" required>
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Confirmar
                                    </button>
                                </div>
                                <div class="form-group text-center">
                                    <hr/>
                                    <span>Sistema desenvolvido pelo 2º Sgt Francês</span>
                                    <p>
                                        <span>2º Batalhão de Fronteira - Seção de Tecnologia da Informação</span>
                                    <p>
                                        <span>RITEX: 895-1758 / Telefone: 3223-4413 Ramal 223</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
        </div>
        <!--BASIC scripts-->
        <!-- ========================================================= -->
        <script src="vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/nano-scroller/nano-scroller.js"></script>
        <!--TEMPLATE scripts-->
        <!-- ========================================================= -->
        <script src="javascripts/template-script.min.js"></script>
        <script src="javascripts/template-init.min.js"></script>
        <!-- SECTION script and examples-->
        <!-- ========================================================= -->
    </body>
</html>
