<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de Status para exibição de Toastr
 */
class Comp_Status implements Componente {
    
    private $codigo = null;
    const LISTA_STATUS = [
        [ "codigo" => 1, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro inserido com sucesso" ],
        [ "codigo" => 2, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro alterado com sucesso" ],
        [ "codigo" => 3, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro deletado com sucesso" ],
        [ "codigo" => 4, "tipo" => Comp_Toastr::TIPO_ERRO, "mensagem" => "Erro ao realizar operação" ],
        [ "codigo" => 5, "tipo" => Comp_Toastr::TIPO_AVISO, "mensagem" => "Faça seu Login novamente" ],
        // Insira aqui os novos status
    ];

    public function __construct() {
        $this->codigo = Serv_Http::get("status");
    }
    
    public function renderizar_html() {
        ?>
        <div></div>
        <?php
    }

    public function renderizar_estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function renderizar_script() {
        foreach (Comp_Status::LISTA_STATUS as $status) {
            if($status["codigo"] == $this->codigo) {
                $comp_toastr = new Comp_Toastr($status["tipo"], $status["mensagem"]);
                $comp_toastr->renderizar_script();
            }
        }
    }
    
    /**
     * Construção rápida de Comp_Status<br>
     * <code>
     * $comp_status = new Comp_Status();<br>
     * $comp_status->renderizar_script();
     * </code>
     */
    public static function criacao_rapida() {
        $comp_status = new Comp_Status();
        $comp_status->renderizar_script();
    }

}