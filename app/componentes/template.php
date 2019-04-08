<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Template para criação de componente
 */
class Comp_Bem_Vindo extends Componente {

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
        <div></div>
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