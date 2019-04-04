<?php
/**
 * Template para criação de componentes
 */
interface Componente {
    
    /**
     * Renderizar HTML
     */
    public function renderizar_html();
    
    /**
     * Renderizar script JS
     */
    public function renderizar_script();
    
    /**
     * Renderizar style CSS
     */
    public function renderizar_estilo();
    
}

