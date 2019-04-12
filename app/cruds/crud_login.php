<?php

/**
 * Crud Login
 */
class Crud_Login {

    /**
     * Verificar se o login é válido
     * @param type $email
     * @param type $senha
     */
    public static function login($email, $senha) {
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' AND ativo = 1";
        $rs = Serv_Banco_Dados::executar_select($sql);
        if(mysqli_num_rows($rs) != 1) {
            return null;
        }
        return Serv_Banco_Dados::get_dados($rs);
    }
}
