<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Rank Sociedade
 */
class Comp_Painel_Rank_Sociedade extends Componente {

    /**
     * Construir componente
     */
    public function __construct() {
        
    }

    /**
     * Renderizar HTML
     */
    public function html() {
        ?>
        <div>
            <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                Rank Sociedade
            </div>
            <div class="shadow-sm p-3 mb-3 bg-white">
                <span class="h1">2º</span>
            </div>
        </div>
        <?php
    }

    /**
     * Renderizar script JS
     */
    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    /**
     * Renderizar estilo CSS
     */
    public function script() {
        ?>
        <script></script>    
        <?php
    }

}
