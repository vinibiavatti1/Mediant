<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar de menu de opções
 */
class Comp_Nav_Menu extends Componente {

    public function __construct() {
        
    }
    
    public function renderizar_estilo() {
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

    public function renderizar_html() {
        ?>
        <nav id="menu" style="display: none;" class="bg-white shadow">
            <ul class="nav flex-column">
                <li id="botao-fechar-menu" class="nav-item p-3 text-white bg-dark fade-item-menu cursor-pointer" title="Fechar Barra de Menus">
                    <h3>Menu</h3> 
                    Vinícius Biavatti
                </li>
                <li class="nav-item list-group-item-action bg-light"><a class="nav-link">Dashboard</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Home</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Unidades</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Home</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Dashboard</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Unidades</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Home</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Dashboard</a></li>
                <li class="nav-item list-group-item-action"><a class="nav-link " href="#!">Sair</a></li>
            </ul>
        </nav>
        <?php
    }

    public function renderizar_script() {
        ?>
        <script></script> 
        <?php
    }

}
