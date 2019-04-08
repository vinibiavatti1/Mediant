<?php
/**
 * Template para criação de componentes
 */
abstract class Componente {
    
    /**
     * Renderizar estilo CSS
     */
    public abstract function renderizar_estilo();
    
    /**
     * Renderizar HTML
     */
    public abstract function renderizar_html();
    
    /**
     * Renderizar script JS
     */
    public abstract function renderizar_script();

    /**
     * Renderizar componente por completo.<br>
     * <code>
     * $this->renderizar_estilo();<br>
     * $this->renderizar_html();<br>
     * $this->renderizar_script();
     * </code>
     */
    public function renderizar() {
        $this->renderizar_estilo();
        $this->renderizar_html();
        $this->renderizar_script();
    }
    
}

