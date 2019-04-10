<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de Toastr
 */
class Comp_Toastr extends Componente {
    
    const TIPO_SUCESSO = "success";
    const TIPO_ERRO = "error";
    const TIPO_INFO = "info";
    const TIPO_AVISO = "warning";
    
    private $mensagem;
    private $tipo;
    
    public function __construct($tipo, $mensagem) {
        $this->tipo = $tipo;
        $this->mensagem = $mensagem;
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
        ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["<?=$this->tipo?>"]("<?=$this->mensagem?>");
            });
        </script>    
        <?php
    }

   /**
    * Construção rápida de Comp_Toastr<br>
    * <code>
    * $comp_toastr = new Comp_Toastr($mensagem, $tipo);<br>
    * $comp_toastr->renderizar_script();
    * </code>
    * @param type $tipo
    * @param type $mensagem
    */
   public static function criacao_rapida($tipo, $mensagem) {
       $comp_toastr = new Comp_Toastr($tipo, $mensagem);
       $comp_toastr->script();
   }
}

