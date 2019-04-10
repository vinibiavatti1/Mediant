
<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de titulo de sessao
 */
class Comp_Titulo_Sessao extends Componente {

    private $titulo;

    /**
     * Construir componente
     */
    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    /**
     * Renderizar HTML
     */
    public function html() {
        ?>
        <div>
            <h2 class="mt-3"><?= $this->titulo ?></h2>
            <hr>
        </div>
        <?php
    }

    /**
     * Renderizar script JS
     */
    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    /**
     * Renderizar estilo CSS
     */
    public function script() {
        ?>
        <script></script>    
        <?php
    }
    
    /**
     * Criação rápida
     */
    public static function criacao_rapida($titulo) {
        $comp = new Comp_Titulo_Sessao($titulo);
        $comp->html();
    }

}
