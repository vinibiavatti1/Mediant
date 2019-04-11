<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ação
Serv_Evento::acao();

// Validar entrada
Serv_Seg::validar_post(["nome","email", "senha", "confirmacao", "politica"]);

// Obter parâmetros HTTP
$nome = Serv_Http::post("nome");
$email = Serv_Http::post("email");
$senha = Serv_Http::post_sha1("senha");
$confirmacao = Serv_Http::post_sha1("confirmacao");
$politica = Serv_Http::post("politica");

if($senha != $confirmacao) {
    Serv_Url::redirecionar_status("app/paginas/pg_cadastro.php", 7);
}
if(!$politica) {
    Serv_Url::redirecionar_status("app/paginas/pg_cadastro.php", 8);
}

$erro = Crud_Usuario::inserir($nome, $email, $senha);
if($erro) {
    Serv_Url::redirecionar_status("app/paginas/pg_cadastro.php", 4);
} else {
    Serv_Url::redirecionar("app/paginas/pg_validacao_email.php");
}