<?php 
require_once 'vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
// you can also load several files
$dotenv->load(__DIR__.'/.env', __DIR__.'/.env.dev');