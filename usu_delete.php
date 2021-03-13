<?php

include("conexao.php");
$pdo_u = conectar("membros");

$id = $_GET["id"];

$idusuario = base64_decode(filter_input(INPUT_GET, "tkusr"));
$deletar = $pdo_u->prepare("DELETE FROM usuarios WHERE id = '$id'");
$deletar->execute();



if($deletar):
	header("Location: cad_usu_comp.php");
endif;
?>
