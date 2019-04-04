<?php
/**
 * Template para criação de trabalhos CRON
 */
interface Cron {
    
    /**
     * Método de execução
     */
    public static function executar();
    
}