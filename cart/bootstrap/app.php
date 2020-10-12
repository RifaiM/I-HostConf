<?php

use Cart\App;
use Slim\Views\Twig;

use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cart',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('8jxhcqgw532p8ksk');
Braintree_Configuration::publicKey('xkbbc4vdw466r6yn');
Braintree_Configuration::privateKey('c7bd3db22e77b152768615b2505a42e5');


require __DIR__ . '/../app/routes.php';

$app->add(new \Cart\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));

$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));