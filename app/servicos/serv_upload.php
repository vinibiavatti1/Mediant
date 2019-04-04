<?php
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço para manipulação de arquivos e tratamento de diretórios.
 */
class Serv_Upload {
    
    /**
     * Criar diretorio.
     * @param type $dir
     */
    public static function criar_dir($dir, $deletar = false) {
        if (file_exists($dir) && $deletar) {
            Serv_Upload::deletar_dir($dir);
        }
        mkdir($dir, 0777, true);
    }
    
    /**
     * Deletar diretório.
     * @param type $dir
     * @return type
     */
    public static function deletar_dir($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
    
    /**
     * Deletar conteúdo do diretorio.
     * @param type $dir
     * @return type
     */
    public static function deletar_conteudo_dir($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
    }
    
    /**
     * Deletar arquivo.
     * @param type $dir
     */
    public static function deletar_arquivo($dir){
        unlink($dir);
    }

    /**
     * Gerar nome do arquivo em milisegundos.
     * @return type
     */
    public static function gerar_nome_arquivo($extensao) {
        return round(microtime(true) * 1000) . $extensao;
    }
    
    /**
     * Upload de arquivo
     * @param type $arquivo
     * @param type $dir
     * @return type
     */
    public static function upload_arquivo($arquivo, $dir, $extensao) {
        Serv_Upload::criar_dir($dir);
        $nome = Serv_Upload::gerar_nome_arquivo($extensao);
        move_uploaded_file($arquivo, "$dir/$nome");
        return $nome;
    }
    
}

