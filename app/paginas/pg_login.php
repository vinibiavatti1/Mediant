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
        Serv_Html::titulo("Login");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body class="fundo">
        <div id="conteudo">
            <div class="container">
                <div class="mt-5" style="text-align: center">
                    <h1 class="font-light">Mediant</h1>
                    <hr class="mt-1 mb-2">
                </div>
                <div class="">
                    <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-secondary text-white">
                        <span>Mediant <?= Config::VERSAO ?></span>
                    </div>
                    <div class="shadow-sm p-3 mb-3 bg-white" style="overflow: hidden; padding-top: 0px!important; padding-bottom: 0px!important;">
                        <div class="row">
                            <div class="col col-lg-4 bg-light pt-3">
                                <form action="../acoes/acao_login.php" method="POST">
                                    <label>E-mail</label>
                                    <div class="input-group mb-2">
                                        <input name="email" type="email" required="" class="form-control" placeholder="Insira seu e-mail" autofocus=""/>
                                    </div>
                                    <label>Senha</label>
                                    <div class="input-group mb-3">
                                        <input name="senha" type="password" required="" class="form-control" placeholder="Insira sua senha" />
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Login</button>
                                    <a href="./pg_cadastro.php" class="btn text-secondary underline-hover cursor-pointer">Cadastrar</a>
                                    <a class="btn text-secondary underline-hover cursor-pointer">Esqueci minha senha</a><br><br>
                                    <b>Mediant</b> é um jogo de gerenciamento estratégico na qual você se torna responsável por administrar sua cidade. O foco do jogo consiste em
                                    batalhas territoriais, rotas comerciais, obtenção de recursos, evolução, etc.
                                </form>
                            </div>
                            <div class="col col-lg-8 d-none d-lg-block" style="position: relative">
                                <img class="mt-4 mb-4" src="../../recursos/map.png" width="100%" />
                            </div>
                        </div>
                    </div>
                    <div class="text-secondary" style="text-align: center">
                        <?php Comp_Copyright::criacao_rapida(); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    Comp_Status::criacao_rapida();
    ?>
    <script>
        $(document).ready(function () {
            
        });
    </script>
    
</html>