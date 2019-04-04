<?php
/**
 * Template para criação de classes CRUD
 */
interface Crud {
    
    /**
     * Obter dados do registro com o id do parâmetro
     * @param type $id
     */
    public static function get($id);
    
    /**
     * Listar registros com condição
     * @param type $filtros
     */
    public static function listar($filtros);
    
    /**
     * Inserir um novo registro
     * @param type $dados
     */
    public static function inserir($dados);
    
    /**
     * Deletar registro
     * @param type $id
     */
    public static function deletar($id);
    
    /**
     * Atualizar registro
     * @param type $id
     * @param type $dados
     */
    public static function atualizar($id, $dados);
    
}

