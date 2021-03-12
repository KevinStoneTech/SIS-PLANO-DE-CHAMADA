<?php
require "conexao.php";
$pdo = conectar("membros");
$setor = filter_input(INPUT_POST, "setor");
$tabela = "setores";     
   try{
       $stmte = $pdo->prepare("INSERT INTO $tabela(setor) VALUES (:setor)");
       $stmte->bindParam(":setor", $setor , PDO::PARAM_STR);
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

header("Location: cad_setor.php");
