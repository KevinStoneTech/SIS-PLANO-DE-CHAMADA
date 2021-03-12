<?php
require "conexao.php";
$pdo = conectar("membros");
$tabela = "estados";
$stmte[1] = $pdo->prepare("INSERT INTO `estados` VALUES(1, 'Acre', 'AC');");
$stmte[2] = $pdo->prepare("INSERT INTO `estados` VALUES(2, 'Alagoas', 'AL');");
$stmte[3] = $pdo->prepare("INSERT INTO `estados` VALUES(3, 'Amazonas', 'AM');");
$stmte[4] = $pdo->prepare("INSERT INTO `estados` VALUES(4, 'Amapá', 'AP');");
$stmte[5] = $pdo->prepare("INSERT INTO `estados` VALUES(5, 'Bahia', 'BA');");
$stmte[6] = $pdo->prepare("INSERT INTO `estados` VALUES(6, 'Ceará', 'CE');");
$stmte[7] = $pdo->prepare("INSERT INTO `estados` VALUES(7, 'Distrito Federal', 'DF');");
$stmte[8] = $pdo->prepare("INSERT INTO `estados` VALUES(8, 'Espírito Santo', 'ES');");
$stmte[9] = $pdo->prepare("INSERT INTO `estados` VALUES(9, 'Goiás', 'GO');");
$stmte[10] = $pdo->prepare("INSERT INTO `estados` VALUES(10, 'Maranhão', 'MA');");
$stmte[11] = $pdo->prepare("INSERT INTO `estados` VALUES(11, 'Minas Gerais', 'MG');");
$stmte[12] = $pdo->prepare("INSERT INTO `estados` VALUES(12, 'Mato Grosso do Sul', 'MS');");
$stmte[13] = $pdo->prepare("INSERT INTO `estados` VALUES(13, 'Mato Grosso', 'MT');");
$stmte[14] = $pdo->prepare("INSERT INTO `estados` VALUES(14, 'Pará', 'PA');");
$stmte[15] = $pdo->prepare("INSERT INTO `estados` VALUES(15, 'Paraíba', 'PB');");
$stmte[16] = $pdo->prepare("INSERT INTO `estados` VALUES(16, 'Pernambuco', 'PE');");
$stmte[17] = $pdo->prepare("INSERT INTO `estados` VALUES(17, 'Piauí', 'PI');");
$stmte[18] = $pdo->prepare("INSERT INTO `estados` VALUES(18, 'Paraná', 'PR');");
$stmte[19] = $pdo->prepare("INSERT INTO `estados` VALUES(19, 'Rio de Janeiro', 'RJ');");
$stmte[20] = $pdo->prepare("INSERT INTO `estados` VALUES(20, 'Rio Grande do Norte', 'RN');");
$stmte[21] = $pdo->prepare("INSERT INTO `estados` VALUES(21, 'Rondônia', 'RO');");
$stmte[22] = $pdo->prepare("INSERT INTO `estados` VALUES(22, 'Roraima', 'RR');");
$stmte[23] = $pdo->prepare("INSERT INTO `estados` VALUES(23, 'Rio Grande do Sul', 'RS');");
$stmte[24] = $pdo->prepare("INSERT INTO `estados` VALUES(24, 'Santa Catarina', 'SC');");
$stmte[25] = $pdo->prepare("INSERT INTO `estados` VALUES(25, 'Sergipe', 'SE');");
$stmte[26] = $pdo->prepare("INSERT INTO `estados` VALUES(26, 'São Paulo', 'SP');");
$stmte[27] = $pdo->prepare("INSERT INTO `estados` VALUES(27, 'Tocantins', 'TO');");
for($n = 1; $n <= 27; $n++){
   try{       
       $executa = $stmte[$n]->execute(); 
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
}
   header("Location: cad_pgrad.php");