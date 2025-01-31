<?php

use App\Controllers\Site\AboutController;
use App\Controllers\Site\CartController;
use App\Controllers\Site\CheckoutController;
use App\Controllers\Site\ContactController;
use App\Controllers\Site\FaqController;
use App\Controllers\Site\HomeController;
use App\Controllers\Site\LoginController;
use App\Controllers\Site\MenuController;
use App\Controllers\Site\OrderDetailsController;
use App\Controllers\Site\PrivacyPoliciesController;
use App\Controllers\Site\RegisterController;
use App\Controllers\Site\UserAccountController;

$app->get('/', HomeController::class . ':index')->setName('home_page');
$app->get('/register', RegisterController::class . ':index')->setName('user_register');
$app->get('/login', LoginController::class . ':index')->setName('user_login');
$app->get('/about', AboutController::class . ':index')->setName('about_page');
$app->get('/cart', CartController::class . ':index')->setName('user_cart');
$app->get('/checkout', CheckoutController::class . ':index')->setName('user_checkout');
$app->get('/contact', ContactController::class . ':index')->setName('contact_page');
$app->get('/faq', FaqController::class . ':index')->setName('faq_page');
$app->get('/menu', MenuController::class . ':index')->setName('menu_page');
$app->get('/order-details', OrderDetailsController::class . ':index')->setName('user_order_details');
$app->get('/privacy-policies', PrivacyPoliciesController::class . ':index')->setName('privacy_policies_page');
$app->get('/user-account', UserAccountController::class . ':index')->setName('user_account');