<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Crud de exemplo
 */
class Crud_Catalogo_Construcao {
    
    /**
     * Obter construções disponívies da cidade
     * @param type $id_cidade
     */
    public static function get_construcoes_disponiveis_cidade($id_cidade) {
        $era = Crud_Cidade::get_cidade($id_cidade)["era"];
        $sql = "
        SELECT  
            catalogo_construcao.id,
            catalogo_construcao.nome,
            catalogo_construcao.descricao,
            COALESCE(construcao.nivel + 1, 1) AS nivel,
            COALESCE(catalogo_construcao.preco_ouro * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_ouro) AS preco_ouro,
            COALESCE(catalogo_construcao.preco_madeira * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_madeira) AS preco_madeira,
            COALESCE(catalogo_construcao.preco_pedra * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_pedra) AS preco_pedra,
            COALESCE(catalogo_construcao.preco_comida * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_comida) AS preco_comida,
            COALESCE(catalogo_construcao.preco_ferro * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_ferro) AS preco_ferro,
            COALESCE(catalogo_construcao.preco_peca * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_peca) AS preco_peca,
            COALESCE(catalogo_construcao.preco_petroleo * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_petroleo) AS preco_petroleo,
            COALESCE(catalogo_construcao.preco_oleo * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_oleo) AS preco_oleo,
            COALESCE(catalogo_construcao.preco_chip * POW((construcao.nivel + 1),catalogo_construcao.taxa_preco),catalogo_construcao.preco_chip) AS preco_chip,
            COALESCE(catalogo_construcao.tempo_inicial * POW((construcao.nivel + 1),catalogo_construcao.taxa_tempo),catalogo_construcao.tempo_inicial) AS tempo
        FROM 
            catalogo_construcao LEFT JOIN construcao ON (construcao.id_construcao = catalogo_construcao.id)
        WHERE 
            construcao.id_cidade = $id_cidade AND catalogo_construcao.id_era <= $era";
        return Serv_Banco_Dados::executar_select($sql);
    }

}