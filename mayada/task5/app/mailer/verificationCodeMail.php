<?php

namespace app\mailer;

use PHPMailer\PHPMailer\Exception;

class verificationCodeMail extends mail
{
    function send()
    {
        try {
            $this->mail->setFrom('anosh2197@gmail.com', 'mayadaproject');
            $this->mail->addAddress($this->mailto);
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            die;
            return false;
        }
    }
}
// new verificationCodeMail('mayadaatef124@gmail.com', 'verification code', 123456);
