<?php

/* Inclusão da classe mPDF */
include('./mpdf60/mpdf.php');

// Extrai os dados do HTML gerado pelo programa PHP
$filename = "code.html";
$html = file_get_contents($filename);
$mpdf = new mPDF('', 'A4', 10, 'DejaVuSansCondensed'); // Página, fonte;

/*
 * A conversão de caracteres foi necessária aqui, mas pode não ser no seu servidor.
 * Certifique-se disso nas configurações globais do PHP.
 * Usar codificação errada resulta em travamento.
 */
//$mpdf->allow_charset_conversion = true; //Ativa a conversão de caracteres;
//$mpdf->charset_in = 'windows-1252'; //Codificação do arquivo '$filename';

/* Propriedades do documento PDF */
$mpdf->SetAuthor('Cláudio'); // Autor
$mpdf->SetSubject("Assunto deste documento"); //Assunto
$mpdf->SetTitle('Titulo do PDF'); //Titulo
$mpdf->SetKeywords('palavras, chave, aqui'); //Palavras chave
$mpdf->SetCreator('Han Solo'); //Criador

/* A proteção para o PDF é opcional */
$mpdf->SetProtection(array('copy', 'print'), '', '#minhasenha'); // Permite apenas copiar e imprimir

/* Geração do PDF */
$mpdf->WriteHTML($html, 0); // Carrega o conteudo do HTML criado;
$mpdf->Output("arquivo.pdf", 'D'); // Cria PDF usando 'D' para forçar o download;
unlink($filename); // Apaga o HTML
ob_clean(); // Descarta o buffer;
exit();
?>