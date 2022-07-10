<?php


namespace source\Core;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email
{

    /**
     * @var array
     */
    private $data;
    /**
     * @var PHPMailer
     */
    private $mail;
    /**
     * @var Message
     */
    private $message;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->message = new Message();

        //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->setLanguage(CONFIG_MAIL_OPTION_LANG);
        $this->mail->isHTML(CONFIG_MAIL_OPTION_HTML);
        $this->mail->SMTPAuth   = CONFIG_MAIL_OPTION_AUTH;                                   //Enable SMTP authentication
        $this->mail->SMTPSecure = CONFIG_MAIL_OPTION_SECURE;            //Enable implicit TLS encryption
        $this->mail->CharSet       = CONFIG_MAIL_OPTION_CHARSET;

        //Auth
        $this->mail->Host = CONFIG_MAIL_HOST;                     //Set the SMTP server to send through
        $this->mail->Username   = CONFIG_MAIL_USER;                     //SMTP username
        $this->mail->Password   = CONFIG_MAIL_PASS;
        $this->mail->Port       = CONFIG_MAIL_PORT;
    }

    public function boostrap(string $subject, string $message, string $toEmail, string $toName): Email
    {
        $this->data = new \stdClass();
        $this->data->subject = $subject;
        $this->data->message = $message;
        $this->data->toEmail = $toEmail;
        $this->data->toName = $toName;

        return $this;
    }

     public function attach(string $fileName, string $filePath): Email {
        $this->data->attach[$fileName] = $filePath;
        return $this;
     }

    public function send($fromEmail = CONFIG_MAIL_SENDER['address'],
                         $fromName = CONFIG_MAIL_SENDER['name']): bool
    {
        echo 'Validando data';
        if (!empty($this->data)){
            $this->message->error("Erro ao enviar, favor verifique os dados");
            return false;
        }
        echo "Validando is email:" . CONFIG_MAIL_SENDER['address'];

        if (!is_email($fromEmail))
        {
            $this->message->warning("O e-mail de remetente não é válido");
            return false;
        }

        try {
            $this->mail->subject = $this->data->subject;
            $this->mail->msgHTML($this->data->message);
            $this->mail->setFrom($fromEmail,$fromName);
           echo 'Tentando adicionar Anexo';
            if (!empty($this->data->attach)){
                foreach ($this->data->attach as $name => $path) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->addAddress($this->data->toEmail, $this->data->toName);
                echo 'Tentando enviar email';
            $this->mail->send();
               echo 'Message has been sent';
            return true;

        }catch (Exception $exception) {
            $this->message->error("Message could not be sent. Mailer Error: {$this->data->ErrorInfo}");
            return false;
        }
    }


    public function mail(): PHPMailer
    {
        return $this->mail;
    }

    public function message(): Message
    {
        return $this->message;
    }


}