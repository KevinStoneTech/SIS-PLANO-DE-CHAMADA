<?php

include("conexao.php");
$pdo_u = conectar("membros");
$tabela = "setores";

$id = $_GET["id"];

$deletar = $pdo_u->prepare("DELETE FROM $tabela WHERE id = '$id'");
$deletar->execute();


if($deletar):
        echo "<script> alert('Deletado com sucesso!'); location.href='cad_setor.php'; </script>";
endif;


?>
