<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

// Evento de Página
Serv_Evento::pagina();

// Validar Sessão
Serv_Seg::validar_sessao([Const_Sessao::CHAVE_ID_USUARIO]);

// Obter Dados
$id_usuario = Serv_Sessao::get("id_usuario");
$mundos = Crud_Mundo::listar_mudos_criar_cidade($id_usuario);
$cidades_usuario = Crud_Cidade::get_cidades_usuario($id_usuario);
?>
<html>
    <head>
        <?php
        Serv_Html::titulo("Mundo");
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
                                <?php if(Serv_Banco_Dados::get_qtd_linhas($cidades_usuario) > 0) { ?>
                                <b>Minhas Cidades</b>
                                <hr class="mt-1 mb-2">
                                <form action="../acoes/acao_cidade.php" method="POST">
                                    <ul class="list-group">
                                        <?php while ($cidade = Serv_Banco_Dados::get_dados($cidades_usuario)) { ?>
                                            <li class="list-group-item"><?= $cidade["nome"] ?> (Mundo <?= $cidade["nome_mundo"] ?>)<a href="../acoes/acao_entrar_cidade.php?id=<?= $cidade["id"] ?>" class="float-right">Entrar</a></li>
                                        <?php } ?>
                                            
                                    </ul>
                                </form>
                                <?php } ?>
                                <b>Criar Cidade</b>
                                <hr class="mt-1 mb-2">
                                <form action="../acoes/acao_cidade.php" method="POST">
                                    <label>Nome</label>
                                    <div class="input-group mb-2">
                                        <input name="nome" type="text" required="" class="form-control" placeholder="Forneça um nome para sua cidade" autofocus=""/>
                                    </div>
                                    <label>Mundo</label>
                                    <select class="form-control">
                                        <?php while ($mundo = Serv_Banco_Dados::get_dados($mundos)) { ?>
                                            <option value="<?= $mundo["id"] ?>"><?= $mundo["nome"] ?> (<?= $mundo["qtd_cidades"] ?> cidade(s))</option>
                                        <?php } ?>
                                    </select>
                                    <br><br>
                                    <button type="submit" class="btn btn-secondary">Criar</button>
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
            $("select").select2();
        });
    </script>

</html>