# Kit Inicial Vrb
O Kit Inicial Vrb se trata de um projeto base para aplicações PHP que visam utilizar o conceito nativo de programação Web. Ele conta com uma coleção de serviços, utilidades, padrões, configurações e plugins pré definidos. 

## Instalação
Para utilizar o kit, baixe e descompacte o arquivo zipado no diretório público de seu servidor. Acesse o projeto via navegador e verifique se uma página de bem vindo é mostrada. Caso isto ocorra, a instalação do kit está concluída com êxito. Caso ocorrer um erro de redirecionamento, basta informar a URL base correta para a configuração <b>URL_BASE</b> no arquivo de configurações <b>/config.php</b> e realizar o teste novamente. Abaixo segue a sessão que diz respeito a este arquivo de configurações.

## Configuração
Ao iniciar o projeto, o arquivo <b>/config.php</b> deve ser configurado de acordo com as definições do projeto. Algumas configurações como título, palavras-chave, responsividade, dados de acesso a base, url_base e etc... devem ser definidas. Recomendamos muito que este arquivo seja clonado com as definições do ambiente de produção (exemplo: <b>config_producao.php</b>), persistindo as configurações de produção e de desenvolvimento. Assim, basta realizar a troca do nome do arquivo ao realizar a atualização do ambiente de produção.
> A configuração <b>MATERIAL_DESIGN</b> refere-se ao tipo de framework css que será usado (Bootstrap ou MaterializeCss). Caso a escolha for material design, alguns componentes podem sofrer inconsistências.

> A configuração <b>IDIOMA</b> pode ser definida pelo arquivo de configurações com base nos dicionários presentes na pasta <b>/app/traducoes</b>. Caso houver algum parâmetro definido na sessao <b>$_SESSION['IDIOMA']</b> esta configuração será desconsiderada, levando em consideração o idioma selecionado na sessão.

## Padrões
O projeto utiliza o padrão de underscore (Underline para espaçamentos) para qualquer conteúdo. Todos os recursos padrões PHP estão localizados na pasta <b>/app</b>.
Os arquivos utilizam um prefixo para definir qual seua funcionalidade. Abaixo segue uma tabela com estas definições:

Prefixo|Local|Descrição
---|---|---
pg_|/app/paginas|Páginas
serv_|/app/servicos|Coleção de funcionalidades padrões
const_|/app/constantes|Coleção de contantes
acao_|/app/acoes|Ações de formulários
ajax_|/app/ajax|Serviços de retorno a requisições ajax
comp_|/app/componentes|Componentes
cron_|/app/crons|Trabalhos Cron
crud_|/app/cruds|Serviços de tratamentos de entidades do Banco de Dados
tpl_|/app/templates|Qualquer tipo de template
css_|/app/estilos|Folhas de estilo em cascata (CSS)
js_|/app/scripts|Scripts com lógica de execução (JS)
eula_|/app/eulas|Arquivos de termos de uso de softwares
sql_|/app/sqls|Arquivos de linguagem de banco de dados (SQL)

## Serviços
Os serviços se tratam de funcionalidades padrões da aplicação. Abaixo seguem os serviços pré existentes no projeto, e sua definição:

Serviço|Definição
---|---
serv_banco_dados|Serviço de conexão e comandos de banco de dados
serv_cabecalho|Serviço de manipulação de cabeçalho HTTP
serv_cookie|Serviço para tratamento de cookies
serv_data|Serviço para tratamentos de datas
serv_email|Serviço de envio de e-mail com PHPMailer
serv_evento|Serviço de controle de eventos da aplicação
serv_html|Serviço de tratamento de Tags, atributos, etc... para arquivos HTML
serv_http|Serviço de controle de variáveis HTTP
serv_importacao|Serviço de importação de módulos
serv_ip|Serviço de endereço de IP
serv_log|Serviço de Log da aplicação
serv_seg|Serviço com validações de segurança para páginas, ações, ajax, etc
serv_sessao|Serviço de manipulação de sessões de usuário
serv_traducao|Serviço de Tradução de aplicação
serv_upload|Serviço para manipulação de arquivos e tratamento de diretórios
serv_url|Serviço de tratamento de URL e redirecionamento
serv_pdf|Serviço de criação de documentos Pdf com plugin Dompdf

## Importação
Qualquer importação da aplicação é realizada pelo serviço de importação <b>Serv_Importacao</b>, exceto por importações muito específicas. Este serviço tem como função realizar a importação de arquivos css, arquivos js, plugins e classes PHP. Quando qualquer recurso novo é adicionado na aplicação, este recurso deve ser adicionado neste serviço para que seja importado. Abaixo seguem as funções de importação deste serviço:

Rotina|Definição
---|---
importar_modulos_css()|Função de importação de arquivos CSS utilizando tags ```<link href="" />```
importar_modulos_js()|Função de importação de arquivos JS utilizando tags ```<script src=""></script>```
importar_modulos_php()|Função de importação de arquivos PHP utilizando a função ```require_once() ```

> A função ```Serv_Importacao::importar_classes_php() ``` realiza a importação de qualquer arquivo com extenção PHP das pastas <b>/app/componentes</b>, <b>/app/constantes</b>, <b>/app/cruds</b> e <b>/app/servicos</b>. O arquivo <b>/config.php</b> também é importado. Arquivos que contenham o prefixo <b>ignorar_</b> serão ignorados na rotina de importação.

## Componentes
Existem uma interface para criação de componentes na qual possui 3 métodos padrões que podem ou não ser implementados:

Método|Definição
---|---
renderizar_html|Renderizar conteúdo HTML gerado do componente
renderizar_script|Renderizar Script JS do componente
renderizar_estilo|Renderizar estilo CSS do componente

Um componente é um objeto PHP, que possui seus atributos na qual manipulam a renderização do HTML, Script ou Estilo. Abaixo segue um exemplo de criação de um componente:

```php
$comp = new Comp_Bem_Vindo("Kit Inicial Vrb");
$comp->renderizar_html();
```

## Crud
As classes Crud servem para manipular entidades na base de dados. A interface disponibiliza 5 métodos para implementação:

Método|Definição
---|---
get($id)|Obter um registro do banco de dados pelo ID
listar($filtros)|Listar todos os regitros do banco de dados ou com base em um filtro especificado
inserir($dados)|Inserir registro no banco de dados
deletar($id)|Deletar registro do banco de dados pelo ID
atualizar($id, $dados)|Atualizar registro do banco de dados

## Cron
Classes Cron focam em uma execução através de algum trabalho cron (Cronjob). A interface cron possui somente o método <b>executar()</b> para ser implementado com base em sua função.

## Páginas
As páginas da aplicação seguem um padrão para organização. Abaixo segue um exemplo de página PHP:

```php
<?php
// Importação
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_classes_php();

// Evento de Página
Serv_Evento::pagina();
?>
<html>
    <head>
        <?php
        Serv_Html::titulo("Bem Vindo");
        Serv_Html::metatags();
        Serv_Importacao::importar_modulos_css();
        Serv_Importacao::importar_modulos_js();
        ?>
    </head>
    <body>
        <?php
        $comp = new Comp_Bem_Vindo("Kit Inicial Vrb");
        $comp->renderizar_html();
        ?>
    </body>
    <script>
        $(document).ready(function () {

        });
    </script>
</html>
```
## Sobre
O projeto foi desenvolvido na plataforma <b>Netbeans 8.1</b>, com a linguagem de programação PHP. O ambiente XAMPP foi utilizado para seu desenvolvimento. Ele utiliza a licença <b>MIT</b> de software livre. Seu autor foi Vinícius Reif Biavatti.
