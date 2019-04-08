<?php
require_once(__DIR__ . "/app/servicos/serv_url.php");
require_once(__DIR__ . "/config.php");
Serv_Url::redirecionar("app/paginas/" . Config::PAGINA_INICIAL);