<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de conexão e comandos de banco de dados
 */
class Serv_Banco_Dados {
    
    /**
     * Realizar conexão com banco de dados
     */
    public static function conectar() {
        $conexao = mysqli_connect(Config::BASE_SERVIDOR, Config::BASE_USUARIO, Config::BASE_SENHA, Config::BASE_NOME, Config::BASE_PORTA);
        if(!$conexao) {
            Serv_Url::redirecionar("app/paginas/pg_erro_conexao_bd.php");
        }
        $conexao->set_charset("utf8");
        
        return $conexao;
    }

    /**
     * Executar consulta
     * @param type $sql
     */
    public static function executar_select($sql) {
        $conexao = Serv_Banco_Dados::conectar();
        $rs = mysqli_query($conexao, $sql);
        if(!$rs) {
            $erro = mysqli_error($conexao);
            Serv_Log::log($erro, Serv_Log::ERRO, $sql);
            return $erro;
        }
        Serv_Log::log("Execução de comando SQL (consulta)", Serv_Log::SQL, $sql);
        return $rs;
    }
    
    /**
     * Executar update
     * @param type $sql
     * @return type - Retorna false se não ocorrer nenhum erro, caso contrário retorna o erro
     */
    public static function executar_update($sql) {
        $conexao = Serv_Banco_Dados::conectar();
        $rs = mysqli_query($conexao, $sql);
        if(!$rs) {
            $erro = mysqli_error($conexao);
            Serv_Log::log($erro, Serv_Log::ERRO, $sql);
            return $erro;
        }
        Serv_Log::log("Execução de comando SQL (update)", Serv_Log::SQL, $sql);
        return false;
    }
    
    /**
     * Obter dados associados do Result Set
     * @param type $rs
     * @return type
     */
    public static function get_dados($rs) {
        return mysqli_fetch_assoc($rs);
    }
    
    /**
     * Obter quantidade de registros da tabela
     * @param type $tabela
     * @return type
     */
    public static function get_qtd_registros($tabela) {
        $rs = Serv_Banco_Dados::executar_select("SELECT COUNT(*) AS QTD FROM $tabela");
        return mysqli_fetch_assoc($rs)["QTD"];
    }
    
    /**
     * Verificar se existe página
     * @param type $tabela
     * @return type
     */
    public static function existe_pagina($tabela, $pagina) {
        $rs = Serv_Banco_Dados::executar_select("SELECT 1 FROM $tabela LIMIT $pagina,1");
        return mysqli_num_rows($rs) > 0;
    }
    
    /**
     * Verificar se existe registro por ID
     * @param type $tabela
     * @return type
     */
    public static function existe_reg($tabela, $id, $campo = "id") {
        $rs = Serv_Banco_Dados::executar_select("SELECT 1 FROM $tabela WHERE $campo = $id");
        return mysqli_num_rows($rs) > 0;
    }
    
    /**
     * Obter informações do registro por página
     * @param type $tabela
     * @return type
     */
    public static function get_info_reg($tabela, $pagina) {
        $rs = Serv_Banco_Dados::executar_select("SELECT * FROM $tabela LIMIT $pagina,1");
        return mysqli_fetch_assoc($rs);
    }
    
    /**
     * Obter último registro inserido da tabela
     * @param type $tabela
     * @param type $coluna_ordem
     * @return type
     */
    public static function get_ultimo_reg_inserido($tabela, $coluna_ordem = "id") {
        $rs = Serv_Banco_Dados::executar_select("SELECT * FROM $tabela ORDER BY $coluna_ordem DESC LIMIT 1");
        return mysqli_fetch_assoc($rs);
    }
}

/**
 * Acesso Global <code>Serv_Banco_Dados::executar_select</code>
 * @param type $sql
 * @return type
 */
function executar_select($sql) {
    return Serv_Banco_Dados::executar_select($sql);
}

/**
* Acesso Global <code>Serv_Banco_Dados::executar_update</code>
 * @param type $sql
 * @return type
 */
function executar_update($sql) {
    return Serv_Banco_Dados::executar_update($sql);
}

/**
* Acesso Global <code>Serv_Banco_Dados::get_dados</code>
 * @param type $rs
 * @return type
 */
function get_dados($rs) {
    return Serv_Banco_Dados::get_dados($rs);
}