<?php

use Angelo\Criptobot\Services\Calculate;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$calculo = new Calculate();
$calculo->constantVerify();