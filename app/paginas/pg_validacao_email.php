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
        Serv_Html::titulo("Validação de E-mail");
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
                        <span>Validação de E-mail</span>
                    </div>
                    <div class="shadow-sm p-3 mb-3 bg-white" style="overflow: hidden; padding-top: 0px!important; padding-bottom: 0px!important;">
                        <div class="row">
                            <div class="col col-lg-4 bg-light pt-3 pb-3">
                                <div class="mb-3">
                                    Um e-mail foi enviado para sua conta de e-mail com o link de validação. Por favor, verifique sua caixa de e-mail.
                                </div>
                                <button id="submit" type="submit" class="btn btn-secondary">Enviar novamente</button>
                                <a href="./pg_login.php" class="btn text-secondary underline-hover cursor-pointer">Voltar</a>
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
            
        });
    </script>
    
</html>