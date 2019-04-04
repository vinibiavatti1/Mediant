<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ajax
Serv_Evento::ajax();

// Validar entrada
Serv_Seg::validar_get(["valor"]);
Serv_Seg::validar_modulo(Const_Modulo::CADASTROS);
Serv_Seg::validar_permissao([Const_Permissao::CADASTRAR]);
Serv_Seg::validar_licenca([Const_Licenca::STANDARD, Const_Licenca::ENTERPRISE]);

// Obter parâmetros HTTP
$valor_1 = Serv_Http::get("valor");
$valor_2 = Serv_Http::post("valor_2", -1);

// Resposta
Serv_Http::json_retorno(200, "Sucesso");
http_response_code(200);