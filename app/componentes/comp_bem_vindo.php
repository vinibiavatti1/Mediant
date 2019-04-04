<?php
// Importar classes
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Componente de exemplo
 */
class Comp_Bem_Vindo implements Componente {
    
    private $projeto;
    
    public function __construct($projeto) {
        $this->projeto = $projeto;
    }
    
    public function renderizar_html() {
        ?>
        <div class="container-fluid">
            <br>
            <h4 class="alert-heading"><?= __("Bem vindo!") ?></h4>
            <p>Agradecemos por utilizar o <?=$this->projeto?>!
                <br>
                <br>
                <b>Dicas</b><br>
                O conteúdo lógico principal da aplicação se encontra na pasta <code>/app</code>, onde estão presentes as páginas do site, ações, serviços e etc.<br>
                Comece configurando seu projeto no arquivo <code>/config.php</code>.<br>
                Após realizar a configuração, verifique o serviço de importação <code>/app/servicos/serv_importacao.php</code> e veja se os arquivos a serem importados são de seu interesse.
                <br>Caso deseje adicionar mais plugins, adicione eles na pasta <code>/plugins</code> e inclua a referência para este plugin no serviço de importação.<br>
                <br>
                <b>Exemplos</b><br>
                <a href="<?= Serv_Url::incluir_url_base("app/paginas/pg_graficos.php");?>">Gráficos</a><br>
                <a href="<?= Serv_Url::incluir_url_base("app/paginas/pg_pdf.php");?>">Pdf</a>
            </p>
            <hr>
            <p class="mb-0"><b>Autor:</b> Vinícius Reif Biavatti</p>
        </div>
        <?php
    }

    public function renderizar_estilo() {
        ?>
        <style></style>    
        <?php
    }

    public function renderizar_script() {
        ?>
        <script></script>    
        <?php
    }

}

