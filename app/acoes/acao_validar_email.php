<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ação
Serv_Evento::acao();

// Validar entrada
Serv_Seg::validar_get(["token"]);

// Obter parâmetros HTTP
$token = Serv_Http::get("token");
Crud_Usuario::set_email_validado($token);

// Redirecionar
Serv_Url::redirecionar_status("app/paginas/pg_exemplo.php", "Operação concluída");