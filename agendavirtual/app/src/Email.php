<?php

namespace app\src;

use PHPMailer\PHPMailer\PHPMailer;
use app\templates\Template;

class Email
{

    private $data;
    private $template;

    private function config(){
        return (object) Load::file('/config.php');
    }

    public function data(array $data)
    {
        $this->data = (object) $data;
        return $this;
    }

    public function template(Template $template)
    {
        if(!isset($this->data)){
            throw new \Exception("Antes de chamar o template, passe os dados atraves do metodo data.");
        }

        $this->template = $template->run($this->data);
        return $this;
    }

    public function send()
    {
        if(!isset($this->template)) {
            throw new \Exception("Por favor, antes de enviar um email, escolha um template com o método template.");
        }
        
        $mailer = new PHPMailer;

        $config = (object) $this->config()->email;

        //Server settings
        // $mailer->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        // $mailer->SMTPDebug = 2; // Enable verbose debug output
        $mailer->isSMTP(); // Send using SMTP
        $mailer->Host = $config->HOST; // Set the SMTP server to send through
        // $mailer->Host = gethostbyname('smtp.gmail.com');
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = $config->USER; // SMTP username
        $mailer->Password = $config->PASS; // SMTP password
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        // $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mailer->Port = $config->PORT; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mailer->CharSet = "UTF-8"; // charset="UTF-8"

        //Recipients
        $mailer->setFrom($this->data->fromEmail, $this->data->fromName);
        $mailer->addAddress($this->data->toEmail, $this->data->toName); // Add a recipient
        // $mailer->addAddress('ellen@example.com'); // Name is optional
        // $mailer->addReplyTo('info@example.com', 'Information');
        // $mailer->addCC('cc@example.com');
        //$mailer->addBCC('bcc@example.com');

        // Attachments
        //$mailer->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        //$mailer->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

        // Content
        $mailer->isHTML(true); // Set email format to HTML
        $mailer->Subject = $this->data->subject;
        $mailer->Body = $this->template;
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();
    }
}
