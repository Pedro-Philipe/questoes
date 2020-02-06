<?php

use App\Application\Console\SeederCommand;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Set up settings
$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/../app/dependencies.php';
$dependencies($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->getContainer()->get('settings');

$application = new Application('Questoes', 'v1');

$application->add(new SeederCommand($app->getContainer()));

$application->run();

