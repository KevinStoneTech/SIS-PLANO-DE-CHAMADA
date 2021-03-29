<?php

include("conexao.php");
$pdo_u = conectar("membros");
$tabela = "subunidade";

$id = $_GET["id"];

$idsub = base64_decode(filter_input(INPUT_GET, "tkusr"));
$deletar = $pdo_u->prepare("DELETE FROM $tabela WHERE id = '$id'");
$deletar->execute();


if($deletar):
        echo "<script> alert('Deletado com sucesso!'); location.href='cad_subunid.php'; </script>";
             //header("Location: cad_usu_comp.php");
endif;


?>
