<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de Log da aplicação. Para que seja utilizado o recurso de log, o
 * banco de dados deve conter uma tabela chamada log. O sql de criação desta
 * tabela pode ser encontrado na pasta "sql". Para que o campo "id_usuario"
 * functione corretamente, a sessão da aplicação deve conter um índice chamado
 * id_usuario contendo o id do mesmo.
 */
class Serv_Log {

    /**
     * Adicionar log na tabela de log
     * @param type $texto
     * @param type $tipo
     * @param type $sql
     */
    public static function log($texto, $tipo, $sql = null) {
        if(!Config::LOG) {
            return;
        }
        if(!in_array($tipo, Config::TIPO_LOG)) {
            return;
        }
        $id_usuario = Serv_Sessao::get("id_usuario") != null ? Serv_Sessao::get("id_usuario") : 'null';
        $url = filter_input(INPUT_SERVER, "REQUEST_URI");
        $ip = Serv_Ip::get_ip();
        $sql_inserir = "INSERT INTO log VALUES (0,$id_usuario,'$url','$ip','$tipo','$texto','$sql',now())";
        $conexao = Serv_Banco_Dados::conectar();
        mysqli_query($conexao, $sql_inserir);
    }
    
}

