<?php

use Angelo\Criptobot\Service\Calculate;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$calculo = new Calculate();
$calculo->constantVerify();