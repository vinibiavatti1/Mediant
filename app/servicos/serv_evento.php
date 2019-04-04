<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de controle de eventos da aplicação. Este serviço deve ser
 * implementado e suas respectivas funções devem ser chamadas de acordo com o
 * tipo da página (pagina de exibição, acao ou ajax).
 */
class Serv_Evento {
    
    /**
     * Evento que será executado em todas as páginas
     */
    public static function pagina() {
        // Introduza o código do evento
        Serv_Evento::todos();
    }
    
    /**
     * Evento que será executado em todas as ações
     */
    public static function acao() {
        // Introduza o código do evento
        Serv_Evento::todos();
    }
    
    /**
     * Evento que será executado em todos os ajax
     */
    public static function ajax() {
        // Introduza o código do evento
        Serv_Evento::todos();
    }
    
    /**
     * Evento que será executado em todos os trabalhos cron
     */
    public static function cron() {
        // Introduza o código do evento
        Serv_Evento::todos();
    }

    /**
     * Evento que será executado ao executar qualquer recurso
     */
    public static function todos() {
        // Introduza o código do evento
    }
}

