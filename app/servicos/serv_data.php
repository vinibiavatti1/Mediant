<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço para tratamentos de datas. O foco deste serviço é padronizar o envio
 * de datas entre as páginas da aplicação.<br>
 * Os métodos desta classe utilizam formatos atribuidos por constantes nesta
 * classe, são eles:<br>
 * <code>const FORMATO_DATA_US = 'Y-m-d';<br></code>
 * <code>const FORMATO_DATA_E_HORA_US = 'Y-m-d H:i:s';<br></code>
 * <code>const FORMATO_DATA_BR = 'd/m/Y';<br></code>
 * <code>const FORMATO_DATA_E_HORA_BR = 'd/m/Y H:i:s';<br></code>
 */
class Serv_Data {
    
    const FORMATO_DATA_US = 'Y-m-d';
    const FORMATO_DATA_E_HORA_US = 'Y-m-d H:i:s';
    const FORMATO_DATA_BR = 'd/m/Y';
    const FORMATO_DATA_E_HORA_BR = 'd/m/Y H:i:s';
    
    /**
     * Converter string para data conforme formato passado.
     * @param type $formato
     * @param type $str_data
     * @return type
     */
    public static function converter_str_para_data($str_data) {
        $str = Serv_Data::substituir_barras($str_data);
        return strtotime($str);
    }

    /**
     * Converter data para string conforme formato passado.
     * @param type $data
     * @param type $formato
     * @return type
     */
    public static function converter_data_para_str($data, $formato = FORMATO_DATA_E_HORA_BR) {
        return date($formato, $data);
    }
    
    /**
     * Substituir '/' para '-'.
     * @param type $str_data
     * @return type
     */
    public static function substituir_barras($str_data) {
        return str_replace("/", "-", $str_data);
    }

    /**
     * Definir fuso horário.<br>
     * Padrão: America/Sao_Paulo.
     */
    public static function set_fuso_horario($local = "America/Sao_Paulo") {
        date_default_timezone_set($local);
    }
}

