<?php

use App\Controllers\Site\HomeController;

$app->get('/', HomeController::class . ':index');