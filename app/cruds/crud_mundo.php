<?php

// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Crud Mundo
 */
class Crud_Mundo {

    /**
     * Obter informações do mundo
     * @param type $id
     * @return type
     */
    public static function get($id) {
        $sql = "SELECT * FROM mundo WHERE id = $id";
        $rs = Serv_Banco_Dados::executar_select($sql);
        return Serv_Banco_Dados::get_dados($rs);
    }

    /**
     * Gerar mundo
     * @param type $nome
     * @param type $tamanho
     * @param type $premium
     * @param type $chance_entidades 10 - 500 (Padrão 50)
     * @param type $id_mundo
     */
    public static function gerar($nome, $tamanho, $premium, $chance_entidades = 50, $id_mundo = null) {
        if ($id_mundo == null) {
            Crud_Mundo::inserir($nome, $tamanho, $premium);
            $id_mundo = Serv_Banco_Dados::get_ultimo_reg_inserido("mundo")["id"];
        }
        for ($i = 0; $i < $tamanho; $i++) {
            for ($j = 0; $j < $tamanho; $j++) {
                $random = random_int(0, $chance_entidades);
                if ($random < 4) {
                    $sql = "INSERT INTO mundo_entidade VALUES (0, $id_mundo, $random, $i, $j, NOW(), NOW(), 0, 1)";
                    Serv_Banco_Dados::executar_update($sql);
                }
            }
        }
    }

    /**
     * Inserir mundo
     * @param type $nome
     * @param type $tamanho
     * @param type $premium
     * @return type
     */
    public static function inserir($nome, $tamanho, $premium) {
        $premium_int = $premium ? 1 : 0;
        $sql = "INSERT INTO mundo VALUES (0,'$nome',$tamanho,$premium_int,NOW(),NOW(),0,1)";
        return Serv_Banco_Dados::executar_update($sql);
    }
    
    /**
     * Obter entidades do mundo
     * @param type $id_mundo
     */
    public static function get_entidades($id_mundo) {
        $sql = "SELECT * FROM mundo_entidade WHERE id_mundo = $id_mundo AND ativo = 1 AND oculto = 0";
        return Serv_Banco_Dados::executar_select($sql);
    }
    
    /**
     * Listar mundos para criar cidade
     * @return type
     */
    public static function listar_mudos_criar_cidade($id_usuario) {
        $sql = "SELECT mundo.id, mundo.nome, COUNT(cidade.id) as qtd_cidades FROM mundo
                LEFT JOIN cidade ON (cidade.id_mundo = mundo.id) 
                WHERE mundo.ativo = 1
                AND mundo.id NOT IN (SELECT cidade.id_mundo FROM cidade WHERE cidade.id_usuario = $id_usuario AND cidade.ativo = 1)
                GROUP BY 1, 2
                ORDER BY mundo.data_cadastro DESC";
        return Serv_Banco_Dados::executar_select($sql);
    }

}
