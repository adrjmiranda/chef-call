<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require_once __DIR__ . '/../app/routes/web/site.php';

$app->run();