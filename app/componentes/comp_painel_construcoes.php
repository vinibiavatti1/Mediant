<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de painel de Construções
 */
class Comp_Painel_Construcoes extends Componente {

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
                Cidade
            </div>
            <div class="shadow-sm p-3 mb-2 bg-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Teste</td>
                            <td><a href="#!">Teste</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teste</td>
                            <td><a href="#!">Teste</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teste</td>
                            <td><a href="#!">Teste</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teste</td>
                            <td><a href="#!">Teste</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teste</td>
                            <td><a href="#!">Teste</a></td>
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
