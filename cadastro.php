<?php
require "conexao.php";
$pdo = conectar("teste");
$nome = "Rafael Wendel Pinheiro";
$tabela = "cadastro";
   $numero = 100;
   $nome = "Rafael Wendel Pinheiro";
     
   try{
       $stmte = $pdo->prepare("INSERT INTO $tabela(nome, numero) VALUES (:nome, :numero)");
       $stmte->bindParam(":nome", $nome , PDO::PARAM_STR);
       $stmte->bindParam(":numero", $numero , PDO::PARAM_INT);
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

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

