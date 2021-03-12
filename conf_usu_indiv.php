<?php
require "versession.php";
require "conexao.php";
date_default_timezone_set("America/Cuiaba");
$pdo = conectar("membros");
$idusuario = base64_decode(filter_input(INPUT_GET, "tkusr"));
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
//$acessorancho = filter_input(INPUT_POST, "acessorancho");
//$contarancho = filter_input(INPUT_POST, "contarancho");
//$contapchamada = filter_input(INPUT_POST, "contapchamada");
//$acessopchamada = filter_input(INPUT_POST, "acessopchamada");
//$userativo = filter_input(INPUT_POST, "userativo");
//$idtcripto = base64_encode($identidade);
$senha = base64_encode(filter_input(INPUT_POST, "senha"));
$tabela = "usuarios";
try {
    $stmte = $pdo->prepare("UPDATE $tabela SET "
            . "idsubunidade = :subunidade, "
            . "nomeguerra = :guerra, idpgrad = :pgrad, nomecompleto = :nome, "
            . "endereco = :endereco, bairro = :bairro, cidade = :cidade, "
            . "estado = :estado, celular = :fonecelular, fixo = :fonefixo, "
            . "email = :email, datanascimento = :datanascimento, "
            . "senha = :senha, datanascimento2 = :datanascimento2 WHERE id = :id");
    $stmte->bindParam(":id", $idusuario, PDO::PARAM_INT);
    //$stmte->bindParam(":idcripto", $idtcripto, PDO::PARAM_STR);
    $stmte->bindParam(":subunidade", $subunidade, PDO::PARAM_INT);
    $stmte->bindParam(":pgrad", $pgrad, PDO::PARAM_INT);
    $stmte->bindParam(":guerra", $guerra, PDO::PARAM_STR);
    $stmte->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmte->bindParam(":endereco", $endereco, PDO::PARAM_STR);
    $stmte->bindParam(":bairro", $bairro, PDO::PARAM_STR);
    $stmte->bindParam(":cidade", $cidade, PDO::PARAM_STR);
    $stmte->bindParam(":estado", $estado, PDO::PARAM_STR);
    $stmte->bindParam(":fonecelular", $fonecelular, PDO::PARAM_STR);
    $stmte->bindParam(":fonefixo", $fonefixo, PDO::PARAM_STR);
    $stmte->bindParam(":email", $email, PDO::PARAM_STR);
    $stmte->bindParam(":datanascimento", $datanascimento, PDO::PARAM_STR);    
    $stmte->bindParam(":senha", $senha, PDO::PARAM_STR);
    $stmte->bindParam(":datanascimento2", $datanascimento2, PDO::PARAM_STR);
    $executa = $stmte->execute();
    if ($executa) {
        echo 'Dados inseridos com sucesso';
        $tabela = "relatorios";
        $sistema = base64_encode($_SESSION['sistema2']);
        $obs = "Dados atualizados referente ao usuário ID".$idusuario;
        $quemgrava = $_SESSION['user_pgradsimples2'] . " " . $_SESSION['user_guerra2'];
        $data = date('d/m/Y');
        $hora = date('H:i:s');
        $gravddos = $pdo->prepare("INSERT INTO $tabela(data, hora, ip, responsavel, sistema, obs) "
                . "VALUES (:data, :hora, :ip, :responsavel, :sistema, :obs)");
        $gravddos->bindParam(":data", $data, PDO::PARAM_STR);
        $gravddos->bindParam(":hora", $hora, PDO::PARAM_STR); // REGISTRA A SENHA IGUAL A IDENTIDADE
        $gravddos->bindParam(":ip", $_SESSION['user_ip2'], PDO::PARAM_STR);
        $gravddos->bindParam(":responsavel", $quemgrava, PDO::PARAM_STR);
        $gravddos->bindParam(":sistema", $sistema, PDO::PARAM_STR);
        $gravddos->bindParam(":obs", $obs, PDO::PARAM_STR);
        $executa = $gravddos->execute();
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("Location: index.php");
?>