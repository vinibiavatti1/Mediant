<?php
// Importar classes
require_once(__DIR__ . "/../../plugins/phpmailer-5.2.15/PHPMailerAutoload.php");
require_once(__DIR__ . "/../servicos/serv_importacao.php");
Serv_Importacao::importar_modulos_php();

/**
 * Serviço de envio de e-mail com PHPMailer
 */
class Serv_Email {
    
    /**
     * Enviar Email com parâmetros pré estabelecidos
     */
    public static function enviar_email($email_remetente, $nome_remetente, $email_destinatario, $nome_destinatário, $assunto, $mensagem) {
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try {
            $mail->Host = Config::EMAIL_SMTP;
            $mail->SMTPAuth = true;
            $mail->Password = Config::EMAIL_SENHA;
            $mail->SMTPSecure = Config::EMAIL_TIPO;
            $mail->Port = Config::EMAIL_PORTA;
            $mail->Username = $email_remetente;
            $mail->CharSet = "UTF-8";
            $mail->SetFrom($email_remetente, $nome_remetente);
            $mail->AddReplyTo($email_remetente, $nome_remetente);
            $mail->Subject = $assunto;
            $mail->AddAddress($email_destinatario, $nome_destinatário);
            $mail->MsgHTML($mensagem);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Send();
            return "success";
        } catch (phpmailerException $e) {
            echo $e->errorMessage();
            return $e;
        }
    }
}
