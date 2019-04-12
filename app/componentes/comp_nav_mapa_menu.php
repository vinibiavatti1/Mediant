<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar de menu de opções do mapa
 */
class Comp_Nav_Mapa_Menu extends Componente {

    public function __construct() {
    }
    
    public function estilo() {
        ?>
        <style>
            #menu {
                top: 0px; 
                left: 0px; 
                position: fixed; 
                width: 240px; 
                height: 100%; 
                z-index: 999;
            }
        </style>    
        <?php
    }

    public function html() {
        ?>
        <nav id="menu" style="display: none;" class="bg-white shadow">
            <ul class="nav flex-column">
                <li id="botao-fechar-menu" class="nav-item p-3 text-white bg-dark fade-item-menu cursor-pointer" title="Fechar Barra de Menus">
                    <h3>Mapa</h3> 
                    Vinícius Biavatti
                </li>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link " href="./pg_dashboard.php">Voltar</a>
                </li>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link " href="#!">Me Localizar</a>
                </li>
                <li class="nav-item list-group-item-action">
                    <a id="botao-opacidade" class="nav-link " id="mudar-lado" href="#!">Mudar Opacidade</a>
                </li>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link " id="mudar-lado" href="#!">Mudar Lado</a>
                </li>
                <li class="nav-item bg-light">
                    <div class="nav-link " href="#!">
                        X: <span id="coordenada-x"></span>
                    </div>
                </li>
                <li class="nav-item bg-light">
                    <div class="nav-link " href="#!">
                        Y: <span id="coordenada-y"></span>
                    </div>
                </li>
            </ul>
        </nav>
        <?php
    }

    public function script() {
        ?>
        <script>
        var lado = false;
        $(document).ready(() => {
            $("#mudar-lado").click(() => {
                if(lado) {
                    $("#menu").css("right","initial");
                    $("#menu").css("left", "0px");
                } else {
                    $("#menu").css("left","initial");
                    $("#menu").css("right", "0px");
                }
                lado = !lado;
            });
        });
        </script> 
        <?php
    }

}
