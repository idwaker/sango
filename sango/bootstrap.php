<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 *
 * Create slim application
 *
 */
$app = new \Slim\App();

/**
 * load application settings
 *
 */
$settings = require __DIR__ . '/settings.php';

/**
 * Fetch DI Container
 */
$container = $app->getContainer();

/**
 * Register Twig View helper
 */
$container->register(new \Slim\Views\Twig(
    $settings['templatePath'], ['cache' => $settings['cachePath']]
));

/**
 * return application object
 */
return $app;
