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
        Serv_Html::titulo("Bem Vindo");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body class="fundo">
        <?php
        $comp_nav_topo = new Comp_Nav_Topo();
        $comp_nav_topo->renderizar_html();
        $comp_nav_topo->renderizar_script();
        
        $comp_nav_menu = new Comp_Nav_Menu();
        $comp_nav_menu->renderizar_html();
        
        $comp_nav_recursos = new Comp_Nav_Recursos();
        $comp_nav_recursos->renderizar_html();
        $comp_nav_recursos->renderizar_script();
        ?>
        
        

        <style>
            

        </style>
        <div id="conteudo">

            <div class="container">
                <h2 class="mt-3">Dashboard</h2>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-lg-4 mb-2">

                        <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                            <span class="float-right"><a href="#!">Evoluir</a></span>Era
                        </div>
                        <div class="shadow-sm p-3 mb-3 bg-white">
                            <span class="h1" style="font-family: serif">IV</span>
                        </div>

                        <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                            Pontuação
                        </div>
                        <div class="shadow-sm p-3 mb-3 bg-white">
                            <span class="h1">182 pts</span>
                        </div>

                        <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                            Recursos
                        </div>
                        <div class="shadow-sm p-3 mb-3 bg-white">
                            <div class="mb-3">
                                <i class="fa fa-coins mr-2"></i> Ouro
                                <span class="float-right">193 <span class="text-secondary">(54/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-tree mr-2"></i> Madeira
                                <span class="float-right">79 <span class="text-secondary">(25/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-cube mr-2"></i> Pedra
                                <span class="float-right"> 15 <span class="text-secondary">(3/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-drumstick-bite mr-2"></i> Comida
                                <span class="float-right">36 <span class="text-secondary">(12/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-cubes mr-2"></i> Ferro
                                <span class="float-right">780 <span class="text-secondary">(60/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-cog mr-2"></i> Peça
                                <span class="float-right">15 <span class="text-secondary">(2/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-tint mr-2"></i> Petróleo
                                <span class="float-right">72000 <span class="text-secondary">(1200/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-oil-can mr-2"></i> Óleo
                                <span class="float-right">15000 <span class="text-secondary">(700/h)</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-microchip mr-2"></i> Chip
                                <span class="text-secondary float-right">2 <span class="text-secondary">(1/d)</span></span>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <i id="pop1" class="fa fa-users mr-2"></i>
                                População <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                                <span class="float-right">47 / <span class="text-secondary">250</span></span>
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-warehouse mr-2"></i> 
                                Armazém <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                                <span class="float-right">1000</span>
                            </div>
                            <div class="">
                                <i class="fa fa-prescription-bottle mr-2"></i>
                                Silo <i id="pop2" class="fa fa-exclamation-triangle mr-2 text-warning"></i> 
                                <span class="float-right">30000</span>
                            </div>
                            <hr>
                            <div class="">
                                <i class="fa fa-flask mr-2"></i>
                                Tecnologia
                                <span class="float-right">7 <span class="text-secondary">(5/h)</span></span>
                            </div>
                        </div>



                        <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                            Rank Global
                        </div>
                        <div class="shadow-sm p-3 mb-3 bg-white">
                            <span class="h1">11º</span>
                        </div>

                        <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                            Rank Sociedade
                        </div>
                        <div class="shadow-sm p-3 mb-3 bg-white">
                            <span class="h1">2º</span>
                        </div>


                    </div>

                    <div class="col-sm-12 col-lg-8">

                        <div>
                            <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                                Novas Notificações
                            </div>
                            <div class="shadow-sm p-0 mb-3 bg-white">
                                <ul class="nav flex-column">
                                    <!--<li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!">Você não possui notificações</a></li>-->
                                    <li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!"><i class="fa fa-exclamation-triangle text-danger"></i> Você foi atacado!</a></li>
                                    <li class="nav-item list-group-item-action"><a class="nav-link text-dark" href="#!"><i class="fa fa-exclamation-triangle text-warning"></i> População Limite Atingida!</a></li>

                                </ul>
                            </div>
                        </div>

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