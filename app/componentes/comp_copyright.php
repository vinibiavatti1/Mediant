<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente Copyright
 */
class Comp_Copyright extends Componente {

    private $empresa;
    private $ano;
    
    /**
     * Construir componente
     */
    public function __construct($empresa = Config::EMPRESA, $ano = null) {
        $this->empresa = $empresa;
        $this->ano = $ano == null ? date("Y") : $ano;
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
     * Renderizar HTML
     */
    public function html() {
        ?>
        <div>Copyright &copy; <?= $this->empresa . " " . $this->ano ?></div>
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
     * Construção rápida de Comp_Copyright<br>
     * <code>
     * $comp_copyright = new Comp_Copyright();<br>
     * $comp_copyright->html();
     * </code>
     */
    public static function criacao_rapida($empresa = Config::EMPRESA, $ano = null) {
        $comp_copyright = new Comp_Copyright($empresa, $ano);
        $comp_copyright->html();
    }
}