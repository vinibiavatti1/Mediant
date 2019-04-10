<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de trabalhos
 */
class Comp_Painel_Construcao_Trabalho extends Componente {

    /**
     * Construir componente
     */
    public function __construct() {
        
    }

    /**
     * Renderizar HTML
     */
    public function html() {
        ?>
        <div>
            <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                Trabalhos
            </div>
            <div class="shadow-sm p-3 mb-3 bg-white table-responsive">
                <table class="table cell-border">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Data Finalização</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Centro 2</td>
                            <td>
                                <i class="fa fa-coins"></i> <span>100,00</span>
                                <i class="fa fa-cube ml-3"></i> <span>20,00</span>
                                <i class="fa fa-coins ml-3"></i> <span>300,00</span>
                            </td>
                            <td>01/01/2019 13:00:00</td>
                            <td><a href="#!" class="text-danger">Cancelar</a></td>
                        </tr>
                        <tr>
                            <td>Madeireira 2</td>
                            <td>
                                <i class="fa fa-coins"></i> <span>100,00</span>
                                <i class="fa fa-cube ml-3"></i> <span>20,00</span>
                                <i class="fa fa-coins ml-3"></i> <span>300,00</span>
                            </td>
                            <td>Em Espera</td>
                            <td><a href="#!" class="text-danger">Cancelar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }

    /**
     * Renderizar script JS
     */
    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    /**
     * Renderizar estilo CSS
     */
    public function script() {
        ?>
        <script></script>    
        <?php
    }

}
