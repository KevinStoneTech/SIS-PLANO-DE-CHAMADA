<?php
require "versession.php";
include "conexao.php";
$pdo_u = conectar("membros");
$idusuario = base64_decode(filter_input(INPUT_POST, "tkusr"));
$consulta2 = $pdo_u->prepare("DELETE FROM usuarios WHERE id = '$idusuario'");
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
    $acessohd = $reg_usu["acessohd"];
    $contahd = $reg_usu["contahd"];
endwhile;



header("Location: cad_usu_comp.php");
?>
