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
                Comp_Titulo_Sessao::criacao_rapida("Dashboard");
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-4 mb-2">
                        <?php
                        // Paineis
                        $comp_painel_era = new Comp_Painel_Era();
                        $comp_painel_era->renderizar();

                        $comp_painel_pontos = new Comp_Painel_Pontos();
                        $comp_painel_pontos->renderizar();

                        $comp_painel_recursos = new Comp_Painel_Recursos();
                        $comp_painel_recursos->renderizar();

                        $comp_painel_rank_global = new Comp_Painel_Rank_Global();
                        $comp_painel_rank_global->renderizar();

                        $comp_painel_rank_sociedade = new Comp_Painel_Rank_Sociedade();
                        $comp_painel_rank_sociedade->renderizar();
                        ?>
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        <?php
                        $comp_painel_notificacoes = new Comp_Painel_Notificacoes();
                        $comp_painel_notificacoes->renderizar();
                        
                        $comp_painel_construcoes = new Comp_Painel_Construcoes();
                        $comp_painel_construcoes->renderizar();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $("table").DataTable();
        });
    </script>
</html>