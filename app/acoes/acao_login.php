<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ação
Serv_Evento::acao();

// Tempo de espera
const TEMPO_ESPERA = 3;

// Validar entrada
Serv_Seg::validar_post(["email", "senha"]);

// Obter parâmetros HTTP
$email = Serv_Http::post("email");
$senha = Serv_Http::post_sha1("senha");

// Login
$usuario = Crud_Login::login($email, $senha);
if($usuario == null) {
    sleep(TEMPO_ESPERA);
    Serv_Url::redirecionar_status("app/paginas/pg_login.php", 9);
}

// Sessão
Serv_Sessao::set("ID_USUARIO", $usuario["id"]);
Serv_Sessao::set("NOME_USUARIO", $usuario["nome"]);
Serv_Sessao::set("EMAIL_USUARIO", $usuario["email"]);

// Redirecionar
Serv_Url::redirecionar("app/paginas/pg_mundo.php");