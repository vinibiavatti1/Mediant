<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar do topo da pagina de mapa
 */
class Comp_Nav_Mapa_Topo extends Componente {

    public function __construct() {
        
    }

    public function estilo() {
        ?>
        <style>
            #nav-topo-mapa {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
            }
        </style>    
        <?php
    }

    public function html() {
        ?>
        <nav id="nav-topo-mapa" class="bg-dark shadow" style="text-align: center">
            <span class="float-left">
                <span href="#!" class="mr-3 d-inline-block p-4 cursor-pointer fade-item-menu" id="botao-menu">
                    <i class="fa fa-lg fa-bars text-white"></i>
                </span>
            </span>
            <span href="#!" class="mr-3 d-inline-block" style="padding: 9px">
                <span class="text-white mb-0" style="font-weight: 300; font-size: 20px;">Mediant</span>
            </span>
        </nav>
        <?php
    }

    public function script() {
        ?>
        <script>
            $(document).ready(() => {
                $("#botao-menu").click(() => {
                    $("#menu").show();
                    document.cookie = "menu_aberto=1";
                });
                $("#botao-fechar-menu").click(() => {
                    $("#menu").hide();
                    document.cookie = "menu_aberto=0";
                });
            });
        </script> 
        <?php
    }

}
