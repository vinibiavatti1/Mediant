<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Catálogo Construção
 */
class Comp_Painel_Catalogo_Construcao extends Componente {

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
                Catálogo de Construções
            </div>
            <div class="shadow-sm p-3 mb-2 bg-white table-responsive">
                <table class="table cell-border">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Rendimento</th>
                            <th>Valor</th>
                            <th>Tempo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Centro 2</td>
                            <td>O Centro tem função d...</td>
                            <td></td>
                            <td>
                                <i class="fa fa-coins"></i> <span>100,00</span>
                                <i class="fa fa-cube ml-3"></i> <span>20,00</span>
                                <i class="fa fa-coins ml-3"></i> <span>300,00</span>
                            </td>
                            <td>12 mim</td>
                            <td><a href="#!">Construir</a></td>
                        </tr>
                        <tr>
                            <td>Madeireira 2</td>
                            <td></td>
                            <td>0.2 / h</td>
                            <td>
                                <i class="fa fa-coins"></i> <span>100,00</span>
                                <i class="fa fa-cube ml-3"></i> <span>20,00</span>
                                <i class="fa fa-coins ml-3"></i> <span>300,00</span>
                            </td>
                            <td>12 mim</td>
                            <td><a href="#!">Construir</a></td>
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
