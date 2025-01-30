<?php

use App\Controllers\Site\HomeController;
use App\Controllers\Site\RegisterController;

$app->get('/', HomeController::class . ':index')->setName('home');
$app->get('/register', RegisterController::class . ':index')->setName('user_register');