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
    private $opacidade;

    /**
     * Construir componente
     */
    public function __construct() {
        $apagar_entidades = Serv_Http::get("apagar_entidades");
        if($apagar_entidades != null) {
            $this->opacidade = "opacidade";
        }
        
        $this->mundo = Crud_Mundo::get_mundo(2);
        $rs = Crud_Mundo::get_entidades($this->mundo["id"]);
        while($row = Serv_Banco_Dados::get_dados($rs)) {
            $this->entidades[$row["x"]."/".$row["y"]] = $row["tipo"];
        }
        $rs = Crud_Cidade::get_cidades_mundo($this->mundo["id"]);
        while($row = Serv_Banco_Dados::get_dados($rs)) {
            $this->cidades[$row["x"]."/".$row["y"]] = [
                "id" => $row["id"],
                "nome" => $row["nome"],
                "usuario" => $row["nome_usuario"]
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
                            if(isset($this->cidades["$i/$j"])) {
                                $id = $this->cidades["$i/$j"]["id"];
                                $nome = $this->cidades["$i/$j"]["nome"];
                                $usuario = $this->cidades["$i/$j"]["usuario"];
                                $conteudo = "<i class='fa fa-map-marker-alt entidade' data-id='$id' data-nome='$nome' data-usuario='$usuario'></i>";
                                $fundo_cidade = "fundo-cidade";
                            } else if(isset($this->entidades["$i/$j"])) {
                                switch ($this->entidades["$i/$j"]) {
                                    case Const_Entidade::ENTIDADE_MONTANHA: $conteudo = "<i class='fa fa-mountain montanha entidade $opacidade'></i>"; break;
                                    case Const_Entidade::ENTIDADE_LAGO: $conteudo = "<i class='fa fa-water agua entidade $opacidade'></i>"; break;
                                    case Const_Entidade::ENTIDADE_FLORESTA: $conteudo = "<i class='fa fa-tree arvore entidade $opacidade'></i>"; break;
                                    default:
                                        break;
                                }
                            }
                            ?>
                        <td class='box' data-y="<?=$i?>" data-x="<?=$j?>">
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
            .opacidade {
                opacity: 0.4;
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
            $(".box").hover(function() {
                $("#coordenada-x").html($(this).attr("data-x"));
                $("#coordenada-y").html($(this).attr("data-y"));
                
            });
        });
        </script>    
        <?php
    }

}
