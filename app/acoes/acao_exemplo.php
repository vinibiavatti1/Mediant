<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ação
Serv_Evento::acao();

// Validar entrada
Serv_Seg::validar_get(["valor"]);
Serv_Seg::validar_modulo(Const_Modulo::CADASTROS);
Serv_Seg::validar_permissao([Const_Permissao::CADASTRAR]);
Serv_Seg::validar_licenca([Const_Licenca::STANDARD, Const_Licenca::ENTERPRISE]);

// Obter parâmetros HTTP
$http_valor_1 = Serv_Http::get("valor");
$http_valor_2 = Serv_Http::post("valor_2", -1);
$http_data = Serv_Http::get("data");
$data = Serv_Data::converter_str_para_data($data_http);

// Redirecionar
Serv_Url::redirecionar_status("app/paginas/pg_login.php", 6);