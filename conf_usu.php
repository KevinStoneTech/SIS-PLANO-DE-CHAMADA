<?php

require "conexao.php";
$pdo = conectar("membros");
$nome = filter_input(INPUT_POST, "nome");
$guerra = filter_input(INPUT_POST, "guerra");
$pgrad = filter_input(INPUT_POST, "pgrad");
$endereco = filter_input(INPUT_POST, "endereco");
$bairro = filter_input(INPUT_POST, "bairro");
$cidade = filter_input(INPUT_POST, "cidade");
$estado = filter_input(INPUT_POST, "estado");
$subunidade = filter_input(INPUT_POST, "subunidade");
$email = filter_input(INPUT_POST, "email");
$fonefixo = filter_input(INPUT_POST, "fonefixo");
$fonecelular = filter_input(INPUT_POST, "fonecelular");
$identidade = filter_input(INPUT_POST, "identidade");
$datanascimento = filter_input(INPUT_POST, "datanascimento");
$datanascimento2 = date_converter($datanascimento);
$acessorancho = "S";
$contarancho = "1";
$contapchamada = "1";
$acessopchamada = " ";
$acessoservico = " ";
$contaservico = " ";
$acessocaveira = " ";
$contacaveira = " ";
$userativo = "S";
$tabela = "usuarios";
$acessohd = "S";
$contahd = "1";
$idtcripto = base64_encode($identidade);
try {
    $gravddos = $pdo->prepare("INSERT INTO $tabela(identidade, senha, idsubunidade, "
            . "idpgrad, nomeguerra,acessorancho, contarancho, acessocaveira, contacaveira, acessoservico, contaservico,"
            . "acessopchamada, contapchamada, userativo, nomecompleto, endereco, bairro, cidade, "
            . "estado, celular, fixo, email, datanascimento, acessohd, contahd, datanascimento2) "
            . "VALUES (:identidade, :senha, :idsubunidade, "
            . ":idpgrad, :nomeguerra, :acessorancho, :contarancho, :acessocaveira, :contacaveira, :acessoservico, :contaservico,"
            . ":acessopchamada, :contapchamada, :userativo, :nomecompleto, :endereco, :bairro, :cidade, "
            . ":estado, :celular, :fixo, :email, :datanascimento, :acessohd, :contahd, :datanascimento2)");
    $gravddos->bindParam(":identidade", $idtcripto, PDO::PARAM_STR);
    $gravddos->bindParam(":senha", $idtcripto, PDO::PARAM_STR); // REGISTRA A SENHA IGUAL A IDENTIDADE
    $gravddos->bindParam(":idsubunidade", $subunidade, PDO::PARAM_INT);
    $gravddos->bindParam(":idpgrad", $pgrad, PDO::PARAM_INT);
    $gravddos->bindParam(":nomeguerra", $guerra, PDO::PARAM_STR);
    $gravddos->bindParam(":acessorancho", $acessorancho, PDO::PARAM_STR);
    $gravddos->bindParam(":contarancho", $contarancho, PDO::PARAM_STR);
    $gravddos->bindParam(":acessocaveira", $acessocaveira, PDO::PARAM_STR);
    $gravddos->bindParam(":contacaveira", $contacaveira, PDO::PARAM_STR);
    $gravddos->bindParam(":acessoservico", $acessoservico, PDO::PARAM_STR);
    $gravddos->bindParam(":contaservico", $contaservico, PDO::PARAM_STR);
    $gravddos->bindParam(":acessopchamada", $acessopchamada, PDO::PARAM_STR);
    $gravddos->bindParam(":contapchamada", $contapchamada, PDO::PARAM_STR);
    $gravddos->bindParam(":userativo", $userativo, PDO::PARAM_STR);
    $gravddos->bindParam(":nomecompleto", $nome, PDO::PARAM_STR);
    $gravddos->bindParam(":endereco", $endereco, PDO::PARAM_STR);
    $gravddos->bindParam(":bairro", $bairro, PDO::PARAM_STR);
    $gravddos->bindParam(":cidade", $cidade, PDO::PARAM_STR);
    $gravddos->bindParam(":estado", $estado, PDO::PARAM_STR);
    $gravddos->bindParam(":celular", $fonecelular, PDO::PARAM_STR);
    $gravddos->bindParam(":fixo", $fonefixo, PDO::PARAM_STR);
    $gravddos->bindParam(":email", $email, PDO::PARAM_STR);
    $gravddos->bindParam(":datanascimento", $datanascimento, PDO::PARAM_STR);
    $gravddos->bindParam(":acessohd", $acessohd, PDO::PARAM_STR);
    $gravddos->bindParam(":contahd", $contahd, PDO::PARAM_STR);
    $gravddos->bindParam(":datanascimento2", $datanascimento2, PDO::PARAM_STR);
    $executa = $gravddos->execute();
    if ($executa) {
        echo 'Dados inseridos com sucesso';
    } else {
        echo 'Erro ao inserir dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("Location: cad_usu_comp.php");
//header("Location: cad_usu.php");
?>
