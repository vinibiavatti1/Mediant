<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de controle de variáveis HTTP. Este serviço introduz um método
 * melhorado para se obter parâmetros GET e POST nos serviços da aplicação.<br>
 * Exemplos de uso:<br>
 * <code>Serv_Http::get('email');</code><br>
 * <code>Serv_Http::post('numero', -1);</code><br>
 * <code>Serv_Http::get_nao_vazio('email');</code><br>
 * <code>Serv_Http::post_sha1('senha');</code>
 */
class Serv_Http {
    
    const HTTP_SUCESSO = "200 - OK";
    const HTTP_REQ_INVALIDA = "400 - Requisição Inválida";
    const HTTP_NAO_AUTORIZADO = "401 - Não Autorizado";
    const HTTP_ACESSO_PROIBIDO = "403 - Acesso Proibido";
    const HTTP_METODO_NAO_PERMITIDO = "405 - Método não permitido";
    const HTTP_ERRO_INTERNO = "500 - Erro interno do servidor";
    
    /**
     * Obter variável GET
     * @param type $nome
     * @param type $outro
     * @return type
     */
    public static function get($nome, $outro = null) {
        $valor = filter_input(INPUT_GET, $nome, FILTER_SANITIZE_MAGIC_QUOTES);
        if($valor == null) {
            return $outro;
        }
        return $valor;
    }
    
    /**
     * Obter variável POST
     * @param type $nome
     * @param type $outro
     * @return type
     */
    public static function post($nome, $outro = null) {
        $valor = filter_input(INPUT_POST, $nome, FILTER_SANITIZE_MAGIC_QUOTES);
        if($valor == null) {
            return $outro;
        }
        return $valor;
    }
    
    /**
     * Obter variável GET não vazio
     * @param type $nome
     * @param type $outro
     * @return type
     */
    public static function get_nao_vazio($nome, $outro = null) {
        $valor = Serv_Http::get($nome);
        if($valor == '') {
            return $outro;
        }
        return $valor;
    }
    
    /**
     * Obter variável POST não vazio
     * @param type $nome
     * @param type $outro
     * @return type
     */
    public static function post_nao_vazio($nome, $outro = null) {
        $valor = Serv_Http::post($nome);
        if($valor == '') {
            return $outro;
        }
        return $valor;
    }

    /**
     * Validar se existe parâmetro GET
     * @param type $nome
     * @return type
     */
    public static function existe_get($nome) {
        return Serv_Http::get($nome) != null;
    }
    
    /**
     * Validar se existe parâmetro POST
     * @param type $nome
     * @return type
     */
    public static function existe_post($nome) {
        return Serv_Http::post($nome) != null;
    }
    
    /**
     * Validar se existe parâmetro GET não vazio
     * @param type $nome
     * @return type
     */
    public static function existe_get_nao_vazio($nome) {
        return Serv_Http::get($nome) != null && Serv_Http::get($nome) != '';
    }
    
    /**
     * Validar se existe parâmetro POST não vazio
     * @param type $nome
     * @return type
     */
    public static function existe_post_nao_vazio($nome) {
        return Serv_Http::post($nome) != null && Serv_Http::post($nome) != '';
    }
    
    /**
     * Obter parâmetro GET convertido em SHA1
     * @param type $nome
     * @return type
     */
    public static function get_sha1($nome) {
        return Serv_Http::existe_get($nome) ? sha1(Serv_Http::get($nome)) : null;
    }
    
    /**
     * Obter parâmetro POST convertido em SHA1
     * @param type $nome
     * @return type
     */
    public static function post_sha1($nome) {
        return Serv_Http::existe_post($nome) ? sha1(Serv_Http::post($nome)) : null;
    }
    
    /**
     * Retorno padrão de mensagens AJAX
     * @param type $codigo
     * @param type $mensagem
     * @param type $dados
     */
    public static function json_retorno($codigo, $mensagem, $dados = null) {
        Serv_Cabecalho::set_conteudo_json();
        $estrutura = [
            "codigo" => $codigo,
            "mensagem" => $mensagem
        ];
        if($dados != null) {
            $estrutura["dados"] = $dados;
        }
        echo json_encode($estrutura);
    }
}