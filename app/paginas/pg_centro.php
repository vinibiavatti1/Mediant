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
        Serv_Html::titulo("Dashboard");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body class="fundo">
        <?php
        // Navbars
        $comp_nav_topo = new Comp_Nav_Topo();
        $comp_nav_topo->renderizar();

        $comp_nav_menu = new Comp_Nav_Menu();
        $comp_nav_menu->renderizar();

        $comp_nav_recursos = new Comp_Nav_Recursos();
        $comp_nav_recursos->renderizar();
        ?>
        <div id="conteudo">
            <div class="container-fluid">
                <?php
                Comp_Titulo_Sessao::criacao_rapida("Centro");
                
                $comp_painel_construcao_trabalho = new Comp_Painel_Construcao_Trabalho();
                $comp_painel_construcao_trabalho->renderizar();
                
                $comp_painel_catalogo_construcao = new Comp_Painel_Catalogo_Construcao();
                $comp_painel_catalogo_construcao->renderizar();
                ?>
                
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $("table").DataTable();
        });
    </script>
</html>