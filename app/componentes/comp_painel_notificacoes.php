<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Notificações
 */
class Comp_Painel_Notificacoes extends Componente {

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
                Novas Notificações
            </div>
            <div class="shadow-sm p-0 mb-3 bg-white">
                <ul class="nav flex-column">
                    <!--<li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!">Você não possui notificações</a></li>-->
                    <li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!"><i class="fa fa-exclamation-triangle text-danger"></i> Você foi atacado!</a></li>
                    <li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!"><i class="fa fa-exclamation-triangle text-warning"></i> População Limite Atingida!</a></li>

                </ul>
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
