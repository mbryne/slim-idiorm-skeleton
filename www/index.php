<?php
require '../vendor/autoload.php';
require '../app/config.php';

// 	prepare orm
ORM::configure('mysql:host=' . $config['database']['server'] . ';dbname=' . $config['database']['name']);
ORM::configure('username', $config['database']['username']);
ORM::configure('password', $config['database']['password']);

//  prepare view
$view = new \app\Library\Extensions\LayoutView(array(
    'layout.auto' => true,
    'layout.path' => '../app/Views/layouts/',
    'layout.file' => 'default.php'
));

// 	prepare app
$app = new \Slim\Slim(array_merge_recursive(array(
    'templates.path' => '../app/Views',
    'view' => $view
), $config['slim']));

//  load controllers
require '../app/Controllers/DefaultController.php';

// 	run app
$app->run();