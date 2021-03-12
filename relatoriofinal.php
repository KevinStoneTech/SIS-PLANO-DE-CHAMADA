<?php
require "versession.php";
include "conexao.php";
//include("mpdf60/mpdf.php");
include "cabecalho.php";
date_default_timezone_set("America/Cuiaba");
$pdo = conectar("membros");
$subunidade = filter_input(INPUT_POST, "subunidade");
$postograd = filter_input(INPUT_POST, "postograd");
$quemgrava = $_SESSION['user_pgradsimples'] . " " . $_SESSION['user_guerra'];
$data = date('d/m/Y');
$hora = date('H:i:s');

if ($subunidade > 0) { // FOI ESCOLHIDO UMA SUBUNIDADE
    $sql = "SELECT * FROM subunidade WHERE id = :idsu";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idsu', $subunidade, PDO::PARAM_INT);
    $stmt->execute();
    $descsu = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $SUnidade = $descsu[0];

    if ($postograd == 0) { // ESCOLHIDO TODOS POSTO/GRADUAÇÃO
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idsubunidade = :idsu AND userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":idsu", $subunidade, PDO::PARAM_INT);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO COMPLETO - " . $SUnidade['descricao'];
    }
    if ($postograd == 1) { // ESCOLHIDO OFICIAIS
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idsubunidade = :idsu AND userativo = 'S' AND idpgrad > 0 && idpgrad <= 8 ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":idsu", $subunidade, PDO::PARAM_INT);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO DE TODOS OS OFICIAIS - " . $SUnidade['descricao'];
    }
    if ($postograd == 2) { // ST/SGT
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idsubunidade = :idsu AND userativo = 'S' AND idpgrad > 8 && idpgrad < 13 ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":idsu", $subunidade, PDO::PARAM_INT);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO DE TODOS OS SUBTENENTES E SARGENTOS - " . $SUnidade['descricao'];
    }
    if ($postograd == 3) { // ESCOLHIDO CB/SD
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE userativo = 'S' AND idsubunidade = :idsu AND idpgrad >= 13 ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":idsu", $subunidade, PDO::PARAM_INT);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO DE TODOS OS CABOS E SOLDADOS - " . $SUnidade['descricao'];
    }
} else { // FOI ESCOLHIDO TODAS AS SU
    if ($postograd == 0) { // ESCOLHIDO TODOS POSTO/GRADUAÇÃO
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO COMPLETO";
    }
    if ($postograd == 1) { // ESCOLHIDO OF
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idpgrad > 0 && idpgrad <= 8 AND userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":data", $datarancho, PDO::PARAM_STR);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO COMPLETO DE TODOS OS OFICIAIS";
    }
    if ($postograd == 2) { // ESCOLHIDO ST/SGT
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idpgrad > 8 && idpgrad < 13 AND userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":data", $datarancho, PDO::PARAM_STR);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO COMPLETO DE TODOS OS SUBTENENTES E SARGENTOS";
    }
    if ($postograd == 3) { // ESCOLHIDO CB/SD
        $filtrorlt = $pdo->prepare("SELECT * FROM usuarios WHERE idpgrad >= 13 AND userativo = 'S' ORDER BY idpgrad, nomecompleto ASC");
        $filtrorlt->bindParam(":data", $datarancho, PDO::PARAM_STR);
        $filtrorlt->execute();
        $qtdusers = $filtrorlt->fetchAll(PDO::FETCH_ASSOC);
        $qtd_users = count($qtdusers);
        $subtitulo = "RELATÓRIO COMPLETO DE TODOS OS CABOS E SOLDADOS";
    }
}
?>
<html lang="pt-BR" class="fixed">
    <meta charset="UTF-8">
    <table border='0' cellpadding='1' cellspacing='1' style='width: 100%'>
        <tbody>
            <tr>
                <td rowspan='3' style='text-align: center;'>
                    <img alt='smiley' height='70' src='./images/eb.jpg' title='smiley' width='50' /></td>
                <td style='text-align: center;'>
                    <span style='font-family:trebuchet ms,helvetica,sans-serif;'><strong><big>2º BATALHÃO DE FRONTEIRA</big></strong></span></td>
                <td rowspan='3' style='text-align: center;'>
                    <img alt='smiley' height='70' src='./images/2bfron.png' title='smiley' width='50' /></td>
            </tr>
            <tr>
                <td style='text-align: center;'>
                    <span style='font-family:trebuchet ms,helvetica,sans-serif;'>SISTEMA PLANO DE CHAMADAS</span></td>
            </tr>
            <tr>
                <td style='text-align: center;'>
                    <span style='font-family:trebuchet ms,helvetica,sans-serif;'><?php echo($subtitulo . " (" . $qtd_users . ")"); ?></span></td>
            </tr>
        </tbody>
    </table>
    <p>
    <table border='1' cellpadding='2' cellspacing='0' style='width: 100%'>
        <tbody>
            <?php
            for ($i = 0; $i < $qtd_users; $i++) {
                $reg = $qtdusers[$i];
                //Pesquisa Posto Graduação
                $consultapg = $pdo->prepare("SELECT * FROM postograd WHERE id = :idpg");
                $regidpgrad = $reg['idpgrad'];
                $consultapg->bindParam(":idpg", $regidpgrad, PDO::PARAM_STR);
                $consultapg->execute();
                $opostograd = $consultapg->fetchAll(PDO::FETCH_ASSOC);
                $regpg = $opostograd[0];
                //CONSULTA SUBUNIDADE                
                $stmt4 = $pdo->prepare("SELECT * FROM subunidade WHERE id = :idsu4");
                $idsu4 = $reg['idsubunidade'];
                $stmt4->bindParam(':idsu4', $idsu4, PDO::PARAM_INT);
                $stmt4->execute();
                $descsu4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                $su4 = $descsu4[0];
                echo("<tr>");
                echo("<td width='45%'>");
                echo("<font face = 'font-family:trebuchet ms,helvetica,sans-serif;' size=2>");
                echo($reg['nomecompleto'] . "<b> (" . $regpg['pgradsimples'] . " " . $reg['nomeguerra'] . ")</b>");
                echo("<br>");
                echo("<b>SU: </b>" . $su4['descricao'] . " -<b> DATA NASCIMENTO:</b>" . $reg['datanascimento']);
                echo("</font>");
                echo("</td>");
                echo("<td width='55%'>");
                echo("<font face = 'font-family:trebuchet ms,helvetica,sans-serif;' size=2>");
                echo("<b>ENDEREÇO: </b>" . $reg['endereco'] . ", " . $reg['bairro'] . ", " . $reg['cidade'] . ", " . $reg['estado']);
                echo("<br>");
                echo("<b>TELEFONE FIXO: </b>" . $reg['fixo'] . ", <b>CELULAR: </b>" . $reg['celular'] . ", <b>EMAIL: </b>" . $reg['email']);
                echo("</font>");
                echo("</td>");
                echo("</tr>");
            }
            ?>
        </tbody>
    </table>
    <p>
    </p>
    <br>
    <?php
    try {
        $tabela = "relatorios";
        $sistema = base64_encode($_SESSION['sistema']);
        $obs = $subtitulo;
        $gravddos = $pdo->prepare("INSERT INTO $tabela(data, hora, ip, responsavel, sistema, obs) "
                . "VALUES (:data, :hora, :ip, :responsavel, :sistema, :obs)");
        $gravddos->bindParam(":data", $data, PDO::PARAM_STR);
        $gravddos->bindParam(":hora", $hora, PDO::PARAM_STR); // REGISTRA A SENHA IGUAL A IDENTIDADE
        $gravddos->bindParam(":ip", $_SESSION['user_ip'], PDO::PARAM_STR);
        $gravddos->bindParam(":responsavel", $quemgrava, PDO::PARAM_STR);
        $gravddos->bindParam(":sistema", $sistema, PDO::PARAM_STR);
        $gravddos->bindParam(":obs", $obs, PDO::PARAM_STR);
        $executa = $gravddos->execute();
        ?>
        <table border='1' cellpadding='2' cellspacing='0' style='width: 100%'>
            <tbody>
                <tr>
                    <td align="center">                        
                        <?php
                        if ($executa) {
                            ?>
                            <font face = 'font-family:trebuchet ms,helvetica,sans-serif;' size=2>
                            Relatório gerado pelo <?php echo($quemgrava); ?> em <?php echo($data); ?> às <?php echo($hora); ?>
                            </font>
                            <?php
                        } else {
                            ?>
                            <font face = 'font-family:trebuchet ms,helvetica,sans-serif;' size=2>
                            Erro ao gravar os dados.<br>Relatório gerado pelo <?php echo($quemgrava); ?> em <?php echo($data); ?> às <?php echo($hora); ?>
                            </font>
                            <?php
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>    
                </td>
            </tr>
        </tbody>
    </table>
</html>
