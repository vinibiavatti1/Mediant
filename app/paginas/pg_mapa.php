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
        Serv_Html::titulo("Mapa");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body>
        <?php
        $comp_nav_mapa_topo = new Comp_Nav_Mapa_Topo();
        $comp_nav_mapa_topo->renderizar();
        
        $comp_nav_mapa_menu = new Comp_Nav_Mapa_Menu();
        $comp_nav_mapa_menu->renderizar();
        
        $comp_mapa = new Comp_Mapa();
        $comp_mapa->renderizar();
        ?>
    </body>
    <script>
        $(document).ready(function () {

        });
    </script>
</html>