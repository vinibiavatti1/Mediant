<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente Mapa
 */
class Comp_Mapa extends Componente {

    private $mundo;
    private $entidades = [];
    private $cidades = [];

    /**
     * Construir componente
     */
    public function __construct() {
        $this->mundo = Crud_Mundo::get(2);
        $rs = Crud_Mundo::get_entidades($this->mundo["id"]);
        while($row = Serv_Banco_Dados::get_dados($rs)) {
            $this->entidades[$row["x"]."/".$row["y"]] = $row["tipo"];
        }
        $rs = Crud_Cidade::get_cidades_mundo($this->mundo["id"]);
        while($row = Serv_Banco_Dados::get_dados($rs)) {
            $this->cidades[$row["x"]."/".$row["y"]] = [
                "id" => $row["id"],
                "nome" => $row["nome"],
                "usuario" => $row["nome_usuario"],
                "pontos" => $row["pontos"]
            ];
        }
    }

    /**
     * Renderizar HTML
     */
    public function html() {
        ?>
        <div id="tela" style="position: absolute; top: 48px; left: 0px; right: 0px; bottom: 0px;">
            <table id="tabela-mapa">
                <tbody>
                    <?php
                    for ($i = 0; $i < $this->mundo["tamanho"]; $i++) {
                        echo("<tr>");
                        for ($j = 0; $j < $this->mundo["tamanho"]; $j++) {
                            $conteudo = "";
                            $opacidade = $this->opacidade;
                            $tooltip = "";
                            $classe = "";
                            if(isset($this->cidades["$i/$j"])) {
                                $id = $this->cidades["$i/$j"]["id"];
                                $nome = $this->cidades["$i/$j"]["nome"];
                                $usuario = $this->cidades["$i/$j"]["usuario"];
                                $pontos = $this->cidades["$i/$j"]["pontos"];
                                $conteudo = "<i class='fa fa-map-marker-alt entidade cidade' data-id='$id' data-nome='$nome' data-usuario='$usuario'></i>";
                                $tooltip = "data-toggle='tooltip' data-placement='top' data-html='true' title='<b>Nome:</b> $nome<br><b>Usuário:</b> $usuario<br><b>Pontuação:</b> $pontos<b><br>X:</b> $j <b>Y:</b> $i'";
                                $classe = "cursor-pointer cidade";
                                $fundo_cidade = "fundo-cidade";
                            } else if(isset($this->entidades["$i/$j"])) {
                                switch ($this->entidades["$i/$j"]) {
                                    case Const_Entidade::ENTIDADE_MONTANHA: $conteudo = "<i class='fa fa-mountain montanha entidade opacidade'></i>"; break;
                                    case Const_Entidade::ENTIDADE_LAGO: $conteudo = "<i class='fa fa-water agua entidade opacidade'></i>"; break;
                                    case Const_Entidade::ENTIDADE_FLORESTA: $conteudo = "<i class='fa fa-tree arvore entidade opacidade'></i>"; break;
                                    default:
                                        break;
                                }
                            }
                            ?>
                        <td class='box <?=$classe?>' data-y="<?=$i?>" data-x="<?=$j?>" <?=$tooltip?>>
                            <div style="width: 32px; height: 32px;  vertical-align: middle!important; line-height: 30px!important">
                                <?= $conteudo ?>
                            </div>
                        </td>
                        <?php
                    }
                    echo("</tr>");
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    /**
     * Renderizar script JS
     */
    public function estilo() {
        ?>
        <style>
            #tabela-mapa {
                border-collapse: initial;
            }
            .box {
                background-color: rgba(0,0,0,0.1);
                text-align: center;
            }
            .entidade {
                margin-top: 10px;
            }
            .montanha {
                color: brown;
            }
            .agua {
                color: blue;
            }
            .arvore {
                color: green;
            }
            .fundo-cidade {
                background-color: rgba(0,0,0,0.2);
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
        $(document).ready(() => {
            
            $('.cidade').tooltip();
            
            $(".box").hover(function (){
                $("#coordenada-x").html($(this).attr("data-x"));
                $("#coordenada-y").html($(this).attr("data-y"));
            });
            var mudar_opacidade = true;
            $("#botao-opacidade").click(() => {
                $("body").loading();
                if(mudar_opacidade) {
                    $(".opacidade").css("opacity",0.3);
                    $("body").loading('stop');
                } else {
                    $(".opacidade").css("opacity",1.0);
                    $("body").loading('stop');
                }
                mudar_opacidade = !mudar_opacidade;
            });
        });
        </script>    
        <?php
    }

}
