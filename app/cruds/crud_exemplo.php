<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Crud de exemplo
 */
class Crud_Exemplo implements Crud {
    
    public static function inserir($dados) {
        $sql = "INSERT INTO usuarios VALUES ('$dados[nome]', '$dados[email]', '$dados[senha]')";
        return executar_update($sql);
    }
    
    public static function get($id) {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $rs = executar_select($sql);
        return get_dados($rs);
    }
    
    public static function listar($filtros) {
        $condicoes = "";
        if(isset($filtros[ativo])) {
            $condicoes .= " AND ativo = $filtros[ativo]";
        }
        $sql = "SELECT * FROM usuarios WHERE 1 = 1 $condicoes";
        return executar_select($sql);
    }

    public static function atualizar($id, $dados) {
        $sql = "UPDATE usuarios SET nome = '$dados[nome]' WHERE id = $id";
        return executar_update($sql);
    }

    public static function deletar($id) {
        $sql = "UPDATE usuarios SET ativo = 0 WHERE id = $id";
        return executar_update($sql);
    }

}