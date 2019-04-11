<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar do topo
 */
class Comp_Nav_Topo extends Componente {

    public function __construct() {
        
    }
    
    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function html() {
        ?>
        <nav id="nav-topo" class="bg-dark shadow" style="text-align: center">
            <span class="float-left">
                <span href="#!" class="mr-3 d-inline-block p-4 cursor-pointer fade-item-menu" id="botao-menu">
                    <i class="fa fa-lg fa-bars text-white"></i>
                </span>
            </span>
            <span href="#!" class="mr-3 d-inline-block" style="padding: 9px">
                <span class="text-white mb-0" style="font-weight: 300; font-size: 20px;">Mediant</span>
            </span>
            <span class="float-right">
                <span href="#!" class="d-inline-block p-4 cursor-pointer fade-item-menu" id="botao-menu-recursos">
                    <i class="fa fa-lg fa-cubes text-white"></i>
                </span>
            </span>
        </nav>
        <?php
    }

    public function script() {
        $menu_aberto = Serv_Cookie::get_cookie("menu_aberto");
        $menu_recursos_aberto = Serv_Cookie::get_cookie("menu_recursos_aberto");
        ?>
        <script>
            var menu_aberto = <?=$menu_aberto ? 1 : 0?>;
            var menu_recursos_aberto = <?=$menu_recursos_aberto ? 1 : 0?>;
            $(document).ready(() => {
                $("#botao-menu").click(() => {
                    $("#menu").show();
                    document.cookie = "menu_aberto=1";
                });
                $("#botao-fechar-menu").click(() => {
                    $("#menu").hide();
                    document.cookie = "menu_aberto=0";
                });
                $("#botao-menu-recursos").click(() => {
                    $("#menu-recursos").show();
                    document.cookie = "menu_recursos_aberto=1";
                });
                $("#botao-fechar-menu-recursos").click(() => {
                    $("#menu-recursos").hide();
                    document.cookie = "menu_recursos_aberto=0";
                });
                if(menu_aberto) {
                    $('#botao-menu').click();
                }
                if(menu_recursos_aberto) {
                    $('#botao-menu-recursos').click();
                }
            });
        </script> 
        <?php
    }

}
