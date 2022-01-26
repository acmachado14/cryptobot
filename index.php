<?php

use Angelo\Criptobot\Services\Calculo;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$calculo = new Calculo();
$calculo->constantVerify();