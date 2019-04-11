<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Crud cidade
 */
class Crud_Cidade {
    
    /**
     * Obter construções disponívies da cidade
     * @param type $id_cidade
     */
    public static function get($id_cidade) {
        $sql = "SELECT * FROM cidade WHERE id = $id_cidade";
        $rs = Serv_Banco_Dados::executar_select($sql);
        return Serv_Banco_Dados::get_dados($rs);
    }
    
    /**
     * Obter cidades do mundo
     * @param type $id_mundo
     * @return type
     */
    public static function get_cidades_mundo($id_mundo) {
        $sql = "SELECT c.*, u.nome as nome_usuario
                FROM cidade c JOIN usuario u ON (c.id_usuario = u.id) 
                WHERE id_mundo = $id_mundo";
        return Serv_Banco_Dados::executar_select($sql);
    }

}