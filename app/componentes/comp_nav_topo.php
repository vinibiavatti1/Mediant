<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar do topo
 */
class Comp_Nav_Topo implements Componente {
    
    private $altura = "50px";

    public function __construct() {
        
    }

    public function renderizar_html() {
        ?>
        <nav class="bg-dark p-3 shadow-sm" style="height: <?=$this->altura?>">
            <div href="#!" class="mr-3 fade-text bg-primary d-inline-block" id="botao-menu">
                <i class="fa fa-lg fa-bars text-white"></i>
            </div>
            <h4 class="text-white" style="display: inline-block; font-weight: normal;">Mediant</h4>
            <span class="float-right">
                <a href="#!" id="botao-menu-recursos" class="">
                    <i class="fa fa-2x fa-cubes text-white pt-2"></i>
                </a>
            </span>
        </nav>
        <?php
    }

    public function renderizar_estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function renderizar_script() {
        ?>
        <script>
            $(document).ready(() => {
                $("#botao-menu").click(() => {
                    $("#menu").show();
                });
                $("#botao-fechar-menu").click(() => {
                    $("#menu").hide();
                });
                $("#botao-menu-recursos").click(() => {
                    $("#menu-recursos").show();
                });
                $("#botao-fechar-menu-recursos").click(() => {
                    $("#menu-recursos").hide();
                });
            });
        </script> 
        <?php
    }

}
