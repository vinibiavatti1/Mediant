<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço com validações de segurança para páginas, ações, ajax, etc.<br>Este
 * serviço contempla uma série de validações como permissões, licenças, módulos
 * etc com base na sessão do usuário. 
 * @see Serv_Sessao
 */
class Serv_Seg {
    
    /**
     * Retornar acesso negado
     * @param type $mensagem
     * @param type $codigo_erro
     */
    public static function acesso_negado($mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        echo($mensagem);
        http_response_code($codigo_erro);
        exit;
    }


    /**
     * Validar parâmetros GET
     * @param array $nomes
     * @param type $mensagem
     */
    public static function validar_get(array $nomes, $retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        foreach ($nomes as $nome) {
            $valor = filter_input(INPUT_GET, $nome);
            if($valor == null) {
                if($retornar) {
                    return false;
                }
                Serv_Seg::acesso_negado($mensagem, $codigo_erro);
            }
        }
        return true;
    }
    
    /**
     * Validar parâmetros POST
     * @param array $nomes
     * @param type $mensagem
     */
    public static function validar_post(array $nomes, $retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        foreach ($nomes as $nome) {
            $valor = filter_input(INPUT_POST, $nome);
            if($valor == null) {
                if($retornar) {
                    return false;
                }
                Serv_Seg::acesso_negado($mensagem, $codigo_erro);
            }
        }
        return true;
    }
    
    /**
     * Validar sessão ativa.
     * Exemplo:<br>
     * <code>
     * Serv_Seg::validar_sessao(); // Acesso Negado
     * Serv_Sessao::set_sessao_ativa();
     * Serv_Seg::validar_sessao(); // Acesso Permitido
     * </code>
     * @param type $retornar
     * @param type $mensagem
     * @param type $codigo_erro
     * @return type
     */
    public static function validar_sessao($retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        if($retornar) {
            return isset($_SESSION[Serv_Sessao::CHAVE_SESSAO]);
        }
        if(!isset($_SESSION[Serv_Sessao::CHAVE_SESSAO])) {
            Serv_Seg::acesso_negado($mensagem, $codigo_erro);
        }
    }

    /**
     * Verificar se usuário tem permissão de acesso ao módulo
     * Exemplo:<br>
     * <code>
     * Serv_Sessao::set_modulos([Const_Modulo::CADASTROS]);<br>
     * Serv_Seg::validar_modulo(Const_Modulo::CADASTROS); // Acesso Permitido<br>
     * Serv_Seg::validar_modulo(Const_Modulo::RELATORIOS); // Acesso Negado
     * </code>
     * @param type $modulo
     * @param type $retornar
     * @param type $mensagem
     * @param type $codigo_erro
     * @return boolean
     * @see Serv_Sessao::set_modulos
     * @see Const_Modulo
     */
    public static function validar_modulo($modulo, $retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        $valido = true;
        if(!isset($_SESSION[Serv_Sessao::CHAVE_MODULOS])) {
            $valido = false;
        } else if(!in_array($modulo, $_SESSION[Serv_Sessao::CHAVE_MODULOS])) {
            $valido = false;
        }
        if($retornar) {
            return $valido;
        }
        if(!$valido) {
            Serv_Seg::acesso_negado($mensagem, $codigo_erro);
        }
    }
    
    /**
     * Verificar se usuário tem permissão de acesso por licença
     * Exemplo:<br>
     * <code>
     * Serv_Sessao::set_licenca(Const_Licenca::STANDARD);<br>
     * Serv_Seg::validar_licenca([Const_Licenca::STANDARD]); // Acesso Permitido<br>
     * Serv_Seg::validar_licenca([Const_Licenca::ENTERPRISE]); // Acesso Negado
     * </code>
     * @param type $licencas
     * @param type $retornar
     * @param type $mensagem
     * @param type $codigo_erro
     * @return boolean
     * @see Serv_Sessao::set_licenca
     * @see Const_Licenca
     */
    public static function validar_licenca(array $licencas, $retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        $valido = true;
        if(!isset($_SESSION[Serv_Sessao::CHAVE_LICENCA])) {
            $valido = false;
        } else if(!in_array($_SESSION[Serv_Sessao::CHAVE_LICENCA], $licencas)) {
            $valido = false;
        }
        if($retornar) {
            return $valido;
        }
        if(!$valido) {
            Serv_Seg::acesso_negado($mensagem, $codigo_erro);
        }
    }
    
    /**
     * Validar permissão de acesso.
     * Exemplo:<br>
     * <code>
     * Serv_Sessao::set_permissoes([Const_Permissao::CADASTRAR]);<br>
     * Serv_Seg::validar_permissao([Const_Permissao::CADASTRAR]); // Acesso Permitido<br>
     * Serv_Seg::validar_permissao([Const_Permissao::ATUALIZAR]); // Acesso Negado
     * </code>
     * @param array $permissoes
     * @param type $retornar
     * @param type $mensagem
     * @param type $codigo_erro
     * @see Serv_Sessao::set_permissoes
     * @see Const_Permissao
     */
    public static function validar_permissao(array $permissoes, $retornar = false, $mensagem = Serv_Http::HTTP_NAO_AUTORIZADO, $codigo_erro = 401) {
        $valido = true;
        if(!isset($_SESSION[Serv_Sessao::CHAVE_PERMISSOES])) {
            $valido = false;
        } else {
            $valido = false;
            foreach ($permissoes as $permissao) {
                if(in_array($permissao, $_SESSION[Serv_Sessao::CHAVE_PERMISSOES])) {
                    $valido = true;
                }
            }
        }
        if($retornar) {
            return $valido;
        }
        if(!$valido) {
            Serv_Seg::acesso_negado($mensagem, $codigo_erro);
        }
    }
    
    /**
     * Validar sessão do usuário
     * @param type $ignorar_cidade
     */
    public static function validar_sessao_usuario($ignorar_cidade = false) {
        $id_usuario = Serv_Sessao::get("id_usuario");
        if($id_usuario == null) {
            Serv_Seg::acesso_negado();
        }
        if(!$ignorar_cidade) {
            $id_cidade = Serv_Sessao::get("id_cidade");
            if($id_cidade == null) {
                Serv_Seg::acesso_negado();
            }
        }
    }
    
}

