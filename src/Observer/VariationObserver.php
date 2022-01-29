<?php

namespace Angelo\Criptobot\Observer;

use Angelo\Criptobot\Service\SendEmail;
use SplObserver;
use SplSubject;

class VariationObserver implements SplObserver
{
    private $mensagem;
    private $sendEmail;

    public function __construct(string $mensagem, SendEmail $sendEmail)
    {
        $this->mensagem = $mensagem;
        $this->sendEmail = $sendEmail;
    }

    public function update(SplSubject $subject): void
    {
        printf(
            $this->mensagem
        );
        //$this->sendEmail->send($this->mensagem);
    }
}