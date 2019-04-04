<?php
/**
 * Configurações da aplicação. Para configurações de PRODUÇÃO é recomendada
 * a clonagem deste arquivo com os dados de produção, e a troca do arquivo
 * config.php no ambiente de produção pelo arquivo clonado.
 */
class Config {
    
    // Idioma
    const IDIOMA = "pt_BR";
    
    // Cogigurações Gerais
    const TITULO = "Site";
    const AUTOR = "Autor";
    const DESCRICAO = "Descrição";
    const PALAVRAS_CHAVE = "Palavras,Chave";
    const RESPONSIVO = true;
    const VERSAO = "1.0.0";

    // URL base para redirecionamentos, importações, etc
    const URL_BASE = "http://localhost/kit-inicial-vrb";
    
    // Configuração de acesso a base de dados
    const BASE_SERVIDOR = "localhost";
    const BASE_USUARIO = "root";
    const BASE_SENHA = "";
    const BASE_PORTA = "3306";
    const BASE_NOME = "base";
    
    // Logs a serem considerados (INFO, ERRO, DEBUG e/ou SQL). Em produção é
    // recomendado deixar a configuração ativa, com o tipo ERRO somente
    const LOG = false;
    const TIPO_LOG = ["INFO, ERRO, DEBUG, SQL"];
    
    // Framework Css (Alguns componentes padrões podem não funcionar corretamente)
    const MATERIAL_DESIGN = false;
    
    // Geração de Senha / Token
    const SALT = "73ef930e2b797a5b5daa73cf3a3025ce853d1bb8";
    
    // Pastas / Arquivos
    const NOME_PASTA_UPLOADS = "uploads";
    const NOME_PASTA_RECURSOS = "recursos";
    
    // Configuração de E-mail
    const EMAIL_SMTP = "smtp.exemplo.com";
    const EMAIL_PORTA = 465;
    const EMAIL_TIPO = "ssl";
    const EMAIL_REMETENTE = "contato@exemplo.com.br";
    const EMAIL_REMETENTE_NOME = "Exemplo";
    const EMAIL_SENHA = "senha";
    
    // Tokens da aplicação
    const TOKEN_1 = "token_1";
    const TOKEN_2 = "token_2";

    /**
     * Obter configuração por nome
     * @param type $nome
     * @return type
     */
    public static function get_config($nome) {
        return Config::$nome;
    }
}