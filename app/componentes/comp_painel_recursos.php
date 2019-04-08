<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Recursos
 */
class Comp_Painel_Recursos extends Componente {

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
                <span class="float-right">
                    <a href="#!">Coletar</a>
                </span>
                <span>Recursos</span>
            </div>
            <div class="shadow-sm p-3 mb-3 bg-white">
                <div class="mb-3">
                    <i class="fa fa-coins mr-2"></i> 
                    <span>Ouro</span> 
                    <span class="text-secondary">(54/h)</span>
                    <span class="float-right">193</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-tree mr-2"></i> 
                    <span>Madeira</span>  
                    <span class="text-secondary">(25/h)</span>
                    <span class="float-right">79</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-cube mr-2"></i> 
                    <span>Pedra</span>  
                    <span class="text-secondary">(3/h)</span>
                    <span class="float-right"> 15</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-drumstick-bite mr-2"></i> 
                    <span>Comida</span>  
                    <span class="text-secondary">(12/h)</span>
                    <span class="float-right">36</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-cubes mr-2"></i> 
                    <span>Ferro</span>  
                    <span class="text-secondary">(60/h)</span>
                    <span class="float-right">780</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-cog mr-2"></i> 
                    <span>Peça</span>  
                    <span class="text-secondary">(2/h)</span>
                    <span class="float-right">15</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-tint mr-2"></i> 
                    <span>Petróleo</span>  
                    <span class="text-secondary">(1200/h)</span>
                    <span class="float-right">72000</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-oil-can mr-2"></i> 
                    <span>Óleo Refinado</span>  
                    <span class="text-secondary">(700/h)</span>
                    <span class="float-right">15000</span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-microchip mr-2"></i> 
                    <span>Chip</span>  
                    <span class="text-secondary">(1/d)</span>
                    <span class="text-secondary float-right">2</span>
                </div>
                <hr>
                <div class="mb-3">
                    <i id="pop1" class="fa fa-users mr-2"></i>
                    <span>População</span>  
                    <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                    <span class="float-right">47 / <span class="text-secondary">250</span></span>
                </div>
                <div class="mb-3">
                    <i class="fa fa-warehouse mr-2"></i> 
                    <span>Armazém</span>  
                    <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                    <span class="float-right">1000</span>
                </div>
                <div class="">
                    <i class="fa fa-prescription-bottle mr-2"></i>
                    <span>Silo</span>  
                    <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                    <span class="float-right">30000</span>
                </div>
                <hr>
                <div class="">
                    <i class="fa fa-flask mr-2"></i>
                    <span>Tecnologia</span>  
                    <span class="text-secondary">(5/h)</span>
                    <span class="float-right">7</span>
                </div>
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
