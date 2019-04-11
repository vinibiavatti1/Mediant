<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Crud Usuario
 */
class Crud_Usuario {
    
    /**
     * Setar email validado do usuario
     * @param type $token
     */
    public static function set_email_validado($token) {
        $sql = "UPDATE usuario SET email_validado = 1 WHERE token = '$token'";
        return Serv_Banco_Dados::executar_update($sql);
    }
    
    /**
     * Inserir Usuario
     * @param type $token
     */
    public static function inserir($nome, $email, $senha) {
        $token = sha1($nome . $email . Config::SALT);
        $sql = "INSERT INTO usuario VALUES (0, '$nome', '$email', '$senha', '$token', 0, 0, NOW(), NOW(), 0, 1)";
        return Serv_Banco_Dados::executar_update($sql);
    }
    
}

