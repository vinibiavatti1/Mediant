<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de ação
Serv_Evento::acao();

// Validar entrada
Serv_Seg::validar_get(["id"]);

// Validar Sessao
Serv_Seg::validar_sessao([Const_Sessao::CHAVE_ID_USUARIO]);

// Obter parâmetros HTTP
$id_cidade = Serv_Http::get("id");
$id_usuario = Serv_Sessao::get("id_usuario");
$cidade = Crud_Cidade::get($id_cidade);
if($cidade["id_usuario"] != $id_usuario) {
    Serv_Seg::acesso_negado();
}

Serv_Sessao::set(Const_Sessao::CHAVE_ID_CIDADE, $cidade["id"]);
Serv_Sessao::set(Const_Sessao::CHAVE_NOME_CIDADE, $cidade["nome"]);

// Redirecionar
Serv_Url::redirecionar("app/paginas/pg_dashboard.php");