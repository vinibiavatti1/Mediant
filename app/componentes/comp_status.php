<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de Status para exibição de Toastr
 */
class Comp_Status extends Componente {
    
    private $codigo = null;
    const LISTA_STATUS = [
        [ "codigo" => 1, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro inserido com sucesso" ],
        [ "codigo" => 2, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro alterado com sucesso" ],
        [ "codigo" => 3, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "Registro deletado com sucesso" ],
        [ "codigo" => 4, "tipo" => Comp_Toastr::TIPO_ERRO, "mensagem" => "Erro ao realizar operação. Tente novamente." ],
        [ "codigo" => 5, "tipo" => Comp_Toastr::TIPO_AVISO, "mensagem" => "Faça seu Login novamente" ],
        [ "codigo" => 6, "tipo" => Comp_Toastr::TIPO_SUCESSO, "mensagem" => "E-mail validado com sucesso! Faça seu login" ],
        [ "codigo" => 7, "tipo" => Comp_Toastr::TIPO_ERRO, "mensagem" => "As senha informada não condiz com a senha de confirmação" ],
        [ "codigo" => 8, "tipo" => Comp_Toastr::TIPO_ERRO, "mensagem" => "O cadastro não pôde ser efeturado pois a política não foi aceita" ],
        [ "codigo" => 9, "tipo" => Comp_Toastr::TIPO_ERRO, "mensagem" => "Usuário e/ou senha inválidos" ]
        // Insira aqui os novos status
    ];

    public function __construct() {
        $this->codigo = Serv_Http::get("status");
    }
    
    public function html() {
        ?>
        <div></div>
        <?php
    }

    public function estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function script() {
        foreach (Comp_Status::LISTA_STATUS as $status) {
            if($status["codigo"] == $this->codigo) {
                $comp_toastr = new Comp_Toastr($status["tipo"], $status["mensagem"]);
                $comp_toastr->script();
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
        $comp_status->script();
    }

}