<?php

require "conexao.php";
$pdo = conectar("membros");
$setor = filter_input(INPUT_POST, "subunidade");
$tabela = "subunidade";
try {
    $stmte = $pdo->prepare("INSERT INTO $tabela(descricao) VALUES (:subunidade)");
    $stmte->bindParam(":subunidade", $setor, PDO::PARAM_STR);
    $executa = $stmte->execute();
    if ($executa) {
        echo 'Dados inseridos com sucesso';
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: cad_subunid.php");
