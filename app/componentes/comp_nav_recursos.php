<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente navbar de recursos
 */
class Comp_Nav_Recursos extends Componente {

    public function __construct() {
        
    }
    
    public function estilo() {
        ?>
        <style>
            #menu-recursos {
                top: 0px; 
                right: 0px; 
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
        <nav id="menu-recursos" style="display: none" class="bg-white shadow">
            <ul class="nav flex-column">
                <li id="botao-fechar-menu-recursos" class="nav-item p-3 text-white bg-dark cursor-pointer fade-item-menu" title="Fechar Barra de Recursos">
                    <h3>Recursos</h3>
                    <span class="">182 pts</span>
                </li>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link" href="#!">
                        <i class="fa fa-sync mr-2"></i> Coletar
                    </a>
                </li>
                <li class="nav-item nav-link"><i class="fa fa-coins mr-2"></i> Ouro <span class="float-right">193</span></li>
                <li class="nav-item nav-link"><i class="fa fa-tree mr-2"></i> Madeira <span class="float-right">79</span></li>
                <li class="nav-item nav-link"><i class="fa fa-cube mr-2"></i> Pedra <span class="float-right">15</span></li>
                <li class="nav-item nav-link"><i class="fa fa-drumstick-bite mr-2"></i> Comida <span class="float-right">36</span></li>
                <li class="nav-item nav-link"><i class="fa fa-cubes mr-2"></i> Ferro <span class="float-right">780</span></li>
                <li class="nav-item nav-link"><i class="fa fa-cog mr-2"></i> Peça <span class="float-right">15</span></li>
                <li class="nav-item nav-link"><i class="fa fa-tint mr-2"></i> Petróleo <span class="float-right">72000</span></li>
                <li class="nav-item nav-link"><i class="fa fa-oil-can mr-2"></i> Óleo <span class="float-right">15000</span></li>
                <li class="nav-item nav-link"><i class="fa fa-microchip mr-2"></i> Chip <span class="float-right">2</span></li>
                <div class="divider"></div>
                <li class="nav-item nav-link"><i class="fa fa-users mr-2"></i> População <span class="float-right">47 / 250</span></li>
                <li class="nav-item nav-link"><i class="fa fa-warehouse mr-2"></i> Armazém <span class="float-right">1000</span></li>
                <li class="nav-item nav-link"><i class="fa fa-prescription-bottle mr-2"></i> Silo <span class="float-right">1200</span></li>
                <div class="divider"></div>
                <li class="nav-item nav-link"><i class="fa fa-flask mr-2"></i> Tecnologia <span class="float-right">7</span></li>
            </ul>
        </nav>
        <?php
    }

    public function script() {
        ?>
        <script></script> 
        <?php
    }

}
