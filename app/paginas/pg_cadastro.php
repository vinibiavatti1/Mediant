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
        Serv_Html::titulo("Cadastro");
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
                        <span>Cadastro</span>
                    </div>
                    <div class="shadow-sm p-3 mb-3 bg-white" style="overflow: hidden; padding-top: 0px!important; padding-bottom: 0px!important;">
                        <div class="row">
                            <div class="col col-lg-4 bg-light pt-3">
                                <form action="../acoes/acao_cadastro.php" method="POST">
                                    <label>E-mail</label>
                                    <div class="input-group mb-2">
                                        <input name="email" type="email" required="" class="form-control" placeholder="Insira um e-mail válido" autofocus=""/>
                                    </div>
                                    <label>Senha</label>
                                    <div class="input-group mb-3">
                                        <input name="senha" type="password" required="" class="form-control" placeholder="Insira uma senha" />
                                    </div>
                                    <label>Confirmação</label>
                                    <div class="input-group mb-3">
                                        <input name="confirmacao" type="password" required="" class="form-control" placeholder="Confirme a senha" />
                                    </div>
                                    <label>Nome</label>
                                    <div class="input-group mb-3">
                                        <input name="nome" type="text" required="" class="form-control" placeholder="Insira um nome de usuário" />
                                    </div>
                                    <div class="form-check mb-3">
                                        <input id="politica" name="politica" type="checkbox" required="" class="form-check-input" />
                                        <label class="form-check-label">
                                            &nbsp;Concordo com o uso de <b>cookies</b> pela aplicação
                                        </label>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-secondary">Cadastrar</button>
                                    <a href="./pg_login.php" class="btn text-secondary underline-hover cursor-pointer">Cancelar</a>
                                </form>
                            </div>
                            <div class="col col-lg-8 d-none d-lg-block" style="position: relative">
                                <img class="mt-4 mb-4" src="../../recursos/map.png" width="100%" />
                            </div>
                        </div>
                    </div>
                    <div class="text-secondary" style="text-align: center">
                        Copyright &copy; VBFoundation <?= date("Y"); ?>
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
            $("#submit").attr("disabled", true);
            $("#politica").click(() => {
                if($("#politica").is(":checked")) {
                    $("#submit").attr("disabled", false);
                } else {
                    $("#submit").attr("disabled", true);
                }
            });
        });
    </script>
</html>