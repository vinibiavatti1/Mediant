<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Evento de Página
Serv_Evento::pagina();

// Dados dos Gráficos
$dados_1 = [
    "labels" => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
        "datasets" => [[
        "label" => 'Dados',
        "backgroundColor" => ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
        "borderColor" => ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
        "borderWidth" => 1,
        "data" => [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)]
    ]]
];
$dados_2 = [
    "labels" => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
    "datasets" => [[
        "label" => 'Dados',
        "backgroundColor" => ["rgba(0, 0, 0, 0.0)"],
        "borderColor" => ["rgb(255, 99, 132)"],
        "borderWidth" => 2,
        "data" => [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)]
    ]]
];
?>
<html>
    <head>
        <?php
        Serv_Html::titulo("Gráficos de Exemplo");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body>
        <?php
        $grafico_1 = new Comp_Grafico_Basico("grafico_1", Comp_Grafico_Basico::TIPO_BARRA, $dados_1);
        $grafico_1->renderizar_html();
        $grafico_2 = new Comp_Grafico_Basico("grafico_2", Comp_Grafico_Basico::TIPO_LINHA, $dados_2);
        $grafico_2->renderizar_html();
        ?>
    </body>
    <script>
        $(document).ready(function () {

        });
    </script>
    <?php $grafico_1->renderizar_script(); ?>
    <?php $grafico_2->renderizar_script(); ?>
</html>