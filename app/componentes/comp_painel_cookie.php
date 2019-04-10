<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de Painel de Cookie
 */
class Comp_Painel_Cookie extends Componente {

    private $aceitou_cookies = false;

    /**
     * Construir componente
     */
    public function __construct() {
        $cookie = Serv_Cookie::get_cookie("aceitou_cookies");
        if ($cookie == 1) {
            $this->aceitou_cookies = true;
        }
    }

    /**
     * Renderizar HTML
     */
    public function html() {
        if (!$this->aceitou_cookies) {
            ?>
            <div id="painel-cookie">
                <div class="shadow-sm pb-1 pt-1 pl-3 pr-3 bg-light">
                    <span>Política de uso de Cookies</span>
                </div>
                <div class="shadow-sm p-3 mb-3 bg-white">
                    <div>
                        Cookies e endereços IP nos permitem entregar e melhorar nosso conteúdo da web fornecendo 
                        uma experiência personalizada. Nosso site usa cookies e coleta seu endereço IP para esses fins. 
                        Você concorda com o uso de cookies pelo site <b><?= $_SERVER["HTTP_HOST"] ?></b> ?
                    </div>
                    <br>
                    <div>
                        <button type="button" class="btn btn-secondary" onclick="concordo()">Concordo</button>
                        <a class="btn text-danger underline-hover cursor-pointer">Não Concordo</a>
                    </div>

                </div> 
            </div>
            <?php
        }
    }

    /**
     * Renderizar script JS
     */
    public function estilo() {
        ?>
        <style>
            #painel-cookie {
                position: fixed;
                bottom: 0px;
                right: 15px;
                max-width: 500px;
                margin-left: 15px;
                z-index: 999;
            }
        </style>    
        <?php
    }

    /**
     * Renderizar estilo CSS
     */
    public function script() {
        ?>
        <script>
            function concordo() {
                document.cookie = "aceitou_cookies=1";
                $("#painel-cookie").hide();
            }
        </script>    
        <?php
    }

}
