<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Pontos
 */
class Comp_Painel_Pontos extends Componente {

    /**
     * Construir componente
     */
    public function __construct() {
        
    }

    /**
     * Renderizar HTML
     */
    public function renderizar_html() {
        ?>
        <div>
            <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                <span>Pontuação</span>
            </div>
            <div class="shadow-sm p-3 mb-3 bg-white">
                <span class="h1">182 pts</span>
            </div>
        </div>
        <?php
    }

    /**
     * Renderizar script JS
     */
    public function renderizar_estilo() {
        ?>
        <style></style>    
        <?php
    }

    /**
     * Renderizar estilo CSS
     */
    public function renderizar_script() {
        ?>
        <script></script>    
        <?php
    }

}
