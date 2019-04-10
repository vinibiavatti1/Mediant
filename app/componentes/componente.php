<?php
/**
 * Template para criação de componentes
 */
abstract class Componente {
    
    /**
     * Renderizar estilo CSS
     */
    public abstract function estilo();
    
    /**
     * Renderizar HTML
     */
    public abstract function html();
    
    /**
     * Renderizar script JS
     */
    public abstract function script();

    /**
     * Renderizar componente por completo.<br>
     * <code>
     * $this->renderizar_estilo();<br>
     * $this->renderizar_html();<br>
     * $this->renderizar_script();
     * </code>
     */
    public function renderizar() {
        $this->estilo();
        $this->html();
        $this->script();
    }
    
}

