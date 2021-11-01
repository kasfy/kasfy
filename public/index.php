<?php

use App\Controllers\AboutController;
use App\Controllers\SiteController;

require_once __DIR__ . '/../vendor/autoload.php';

use Universe\Application;

$config = [
    'userClass' => \App\Models\User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=test',
        'user' => 'root',
        'password' => '',
    ]
];

$app = new Application(dirname(__DIR__), $config);

// $app->on(Application::EVENT_BEFORE_REQUEST, function(){
//     echo "Before request from second installation";
// });

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);
$app->router->get('/profile', [SiteController::class, 'profile']);

$app->run();