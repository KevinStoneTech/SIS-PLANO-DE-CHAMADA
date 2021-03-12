<?php

require "conexao.php";
$pdo1 = conectar("membros");
$pdo2 = conectar2("arranchamento");
$totalmembros = "SELECT * FROM usuarios";
$totalrancho = "SELECT * FROM arranchado";
$stmt1 = $pdo1->prepare($totalmembros);
$stmt1->execute();

$stmt2 = $pdo2->prepare($totalrancho);
$stmt2->execute();

$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
echo(count($result1));
echo("</br>");
echo(count($result2));

?>

