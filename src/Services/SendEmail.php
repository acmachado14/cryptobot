<?php

namespace Angelo\Criptobot\Services;

use Exception;
use SendGrid;
use SendGrid\Mail\Mail;
class SendEmail {

    private string $key;
    private string $email;

    public function __construct()
    {
        $this->key = $_ENV['SENDGRID_API_KEY'];
        $this->email = $_ENV['EMAIL_API'];
    }

    public function send(string $mensagem): void
    {
        $email = new Mail();
        $email->setFrom($this->email, "Bitcoin");
        $email->setSubject("SOBRE SEU DINHEIRO!!");
        $email->addTo($this->email, "Angelo");
        $email->addContent(
            "text/html", "<strong>{$mensagem}</strong>"
        );
        $sendgrid = new SendGrid($this->key);
        try {
            $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}