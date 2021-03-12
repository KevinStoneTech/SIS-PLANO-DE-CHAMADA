<?php
require "conexao.php";
$pdo = conectar("membros");
$pgrad = filter_input(INPUT_POST, "pgrad");
$siglapg = filter_input(INPUT_POST, "siglapg");
$tabela = "postograd";     
   try{
       $stmte = $pdo->prepare("INSERT INTO $tabela(postograd, pgradsimples) VALUES (:pgrad, :siglapg)");
       $stmte->bindParam(":pgrad", $pgrad , PDO::PARAM_STR);
       $stmte->bindParam(":siglapg", $siglapg , PDO::PARAM_INT);
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
   header("Location: cad_pgrad.php");