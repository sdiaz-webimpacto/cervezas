<?php

use PHPMailer\PHPMailer\PHPMailer;

class CustomerTools
{
    public static function encryptation($plainText)
    {
        $result = crypt($plainText, '$2a$09$santicodespecialencrypt$');
        return $result;
    }

    public static function sendMail($from, $addReply, $subject, $to, $template)
    {

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->isMail();
        // email addres + name ej: 'address@address.com', 'Fulanito de Tal'
        $mail->setFrom($from);
        // email addres + name ej: 'address@address.com', 'Fulanito de Tal'
        $mail->addReplyTo($addReply);
        // string
        $mail->Subject = $subject;
        // Destination email address
        $mail->addAddress($to);
        // Text into email in HTML Format
        $mail->msgHTML($template);

        $sendMail = $mail->Send();
        if (!$sendMail) {
            return false;

        } else {
            return "ok";
        }
    }
}