<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// Laravel palaišanas sākuma laiks
define('LARAVEL_START', microtime(true));

// Pārbauda, vai aplikācija ir uzturēšanas (maintenance) režīmā
// Ja jā, tiek nolasīts speciāls uzturēšanas fails
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Ielādē Composer autoladeri, lai PHP varētu atrast visas klases
require __DIR__.'/../vendor/autoload.php';

// Ielādē Laravel aplikāciju
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Apstrādā ienākošo HTTP pieprasījumu un nosūta atbildi lietotājam
$app->handleRequest(Request::capture());
