<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Evento de Página
Serv_Evento::pagina();
?>
<html>
    <head>
        <?php
        Serv_Html::titulo("Titulo");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body>
        <?php 
            // TODO
        ?>
    </body>
    <script>
        $(document).ready(function () {

        });
    </script>
</html>