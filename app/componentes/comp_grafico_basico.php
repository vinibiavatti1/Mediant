<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de gráfico (Chartjs)
 */
class Comp_Grafico_Basico extends Componente {

    const TIPO_BARRA = "bar";
    const TIPO_LINHA = "line";

    private $tipo_grafico;
    private $dados;
    private $largura;
    private $altura;
    private $id;

    public function __construct($id, $tipo_grafico, $dados, $altura = "400px", $largura = "50%") {
        $this->tipo_grafico = $tipo_grafico;
        $this->dados = $dados;
        $this->largura = $largura;
        $this->altura = $altura;
        $this->id = $id;
    }

    public function html() {
        ?>
        <div style="width:<?= $this->largura ?>; height:<?= $this->altura ?>">
            <canvas id="<?= $this->id ?>"></canvas>
        </div>

        <?php
    }

    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function script() {
        ?>
        <script>
            $(document).ready(function () {
                var ctx = document.getElementById('<?= $this->id ?>').getContext('2d');
                var myLineChart = new Chart(ctx, {
                    type: '<?= $this->tipo_grafico ?>',
                    data: <?= json_encode($this->dados) ?>,
                    options: {
                        "responsive": true,
                        "maintainAspectRatio": false
                    }
                });
            });
        </script>    
        <?php
    }

}
