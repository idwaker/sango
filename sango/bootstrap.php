<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * load application settings
 *
 */
$settings = require __DIR__ . '/settings.php';

/**
 *
 * Create slim application
 *
 */
$app = new \Slim\App($settings);

/**
 * Fetch DI Container
 */
$container = $app->getContainer();

/**
 * register db
 */
$container['db'] = function ($c) {
    $_settings = $c['settings']['database'];
    return new \Slim\PDO\Database(
        $_settings['dsn'], $_settings['username'], $_settings['password']
    );
};

/**
 * Register Twig View helper
 */
$view = new \Slim\Views\Twig(
    $app->settings['view']['template_path'],
    $app->settings['view']['twig']
);
$twig = $view->getEnvironment();
$twig->addExtension(new Twig_Extension_Debug());
$container->register($view);

/**
 * monolog handler
 */
$container['logger'] = function ($c) {
    $_settings = $c['settings']['logger'];
    $logger = new \Monolog\Logger($_settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($_settings['path'],
        \Monolog\Logger::DEBUG));
    return $logger;
};

/**
 * load all routes here
 */
if (in_array('INSTALLED_APPS', $settings)) {
    foreach ($settings['INSTALLED_APPS'] as $app) {
        require_once __DIR__ . '/' . APP_NAME . '/' . $app . 'routes.php';
    }
}

// finally load application route
require_once __DIR__ . '/routes.php';

/**
 * return application object
 */
return $app;
