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
    public function html() {
        ?>
        <div>
            <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                Cidade
            </div>
            <div class="shadow-sm p-3 mb-2 bg-white">
                <table class="table cell-border">
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
                            <td>Centro</td>
                            <td><a href="#!">Visitar</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Quartel</td>
                            <td><a href="#!">Visitar</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Mina de Ouro</td>
                            <td><a href="#!">Visitar</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Madeireira</td>
                            <td><a href="#!">Visitar</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Centro de Pesquisa</td>
                            <td><a href="#!">Visitar</a></td>
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
