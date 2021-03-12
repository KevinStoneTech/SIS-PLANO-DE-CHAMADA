<?php
require "conexao.php";
$pdo = conectar("membros");
$bairro = filter_input(INPUT_POST, "bairro");
$setor = filter_input(INPUT_POST, "setor");
$tabela = "bairros";     
   try{
       $stmte = $pdo->prepare("INSERT INTO $tabela(bairro, setor) VALUES (:bairro, :setor)");
       $stmte->bindParam(":bairro", $bairro , PDO::PARAM_STR);
       $stmte->bindParam(":setor", $setor , PDO::PARAM_INT);
       $executa = $stmte->execute(); 
       if($executa){
           echo 'Dados inseridos com sucesso';
       }
       else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
   header("Location: cad_bairro.php");