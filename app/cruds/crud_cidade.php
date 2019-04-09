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
    public static function get_cidade($id_cidade) {
        $sql = "SELECT * FROM cidade WHERE id = $id_cidade";
        $rs = Serv_Banco_Dados::executar_select($sql);
        return Serv_Banco_Dados::get_dados($rs);
    }

}