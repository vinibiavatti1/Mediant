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
    public function html() {
        ?>
        <div></div>
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