<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Chamar evento de cron
Serv_Evento::cron();

/**
 * Cron Job de Exemplo
 */
class Cron_Exemplo implements Cron {
    
    public static function executar() {
        print("Sucesso!");
    }
    
}
Cron_Exemplo::executar();