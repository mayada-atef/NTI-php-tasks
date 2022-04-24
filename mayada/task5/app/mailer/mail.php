<?php

namespace app\mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class mail
{
    protected PHPMailer $mail;
    protected  $mailto;
    protected $subject;
    protected $body;
    function __construct($mailto, $subject, $body)
    {
        $this->mailto = $mailto;
        $this->$subject = $subject;
        $this->body = $body;

        //Create an instance; passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'anosh2197@gmail.com';                     //SMTP username
        $this->mail->Password   = 'anosh2197anosh';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    }
    public abstract function send();
}
