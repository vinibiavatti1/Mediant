<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

$html = "<b style='font-family: sans-serif'>Hello World!</b>";

Serv_Pdf::gerar_pdf($html);