<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .box {
                padding: 80px!important;
                background-color: rgba(0,0,0,0.1);
                text-align: center;
            }
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
    </head>
    <body>
        <div id="tela" style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px;">
            <table>
                <tbody>
                    <?php
                    for ($i = 0; $i < 100; $i++) {
                        echo("<tr>");
                        for ($j = 0; $j < 100; $j++) {
                            $r = random_int(0, 50);
                            $conteudo = "";
                            $blue = "";
                            if($r == 0) {
                                $conteudo = "<i class='fa fa-mountain' style='color: brown'></i>";
                            } else if($r == 1) {
                                $conteudo = "<i class='fa fa-water' style='color: blue'></i>";
                            } else if($r == 2) {
                                $conteudo = "<i class='fa fa-tree' style='color: green'></i>";
                            } else if($r == 3) {
                                $conteudo = "<i class='fa fa-map-marker-alt' style='color: black'></i>";
                            }
                            echo("<td class='box' style=''>$conteudo</td>");
                        }
                        echo("</tr>");
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    <script>
    document.getElementById("tela").style.height=(window.innerHeight);
    </script>
</html>
