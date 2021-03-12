<?php
ob_start(); // Ativa o buffer de saída do PHP

require "versession.php";
include "conexao.php";
include("mpdf60/mpdf.php");

$html = "<table border='0' cellpadding='1' cellspacing='1' style='width: 100%'>";
$html .= "<tbody>";
$html .= "<tr>";
$html .= "<td rowspan='3' style='text-align: center;'>";
$html .= "<img alt='smiley' height='70' src='./images/eb.jpg' title='smiley' width='50' /></td>";
$html .= "<td style='text-align: center;'>";
$html .= "<span style='font-family:trebuchet ms,helvetica,sans-serif;'><strong><big>2º BATALHÃO DE FRONTEIRA</big></strong></span></td>";
$html .= "<td rowspan='3' style='text-align: center;'>";
$html .= "<img alt='smiley' height='70' src='./images/2bfron.png' title='smiley' width='50' /></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td style='text-align: center;'>";
$html .= "<span style='font-family:trebuchet ms,helvetica,sans-serif;'>SISTEMA PLANO DE CHAMADAS</span></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td style='text-align: center;'>";
$html .= "<span style='font-family:trebuchet ms,helvetica,sans-serif;'>RELATÓRIO DE MILITARES PRONTOS</span></td>";
$html .= "</tr>";
$html .= "</tbody>";
$html .= "</table>";
$html .= "<p>";
$html .= "<table border='1' cellpadding='2' cellspacing='0' style='width: 100%'>";
$html .= "<tbody>";
$html .= "<tr>";
$html .= "<td width='30%'>";
$html .= "Posto/Graduação<br>NomeGuerra<br>Dt Nascimento</td>";
$html .= "<td width='70%'>";
$html .= "Nome completo<br>Endereço,Bairro<br>Telefone,email</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "</tr>";
$html .= "</tbody>";
$html .= "</table>";
$html .= "<p>";
$html .= "</p>";
$html .= "<p>";
$html .= "Relatório enviado pelo USUÁRIO em DATA e Hora</p>";

$mpdf = new mPDF('','A4',10);
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/estilo.css");
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;
?>
