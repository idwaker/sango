<?php

/**
 * load autoload file
 *
 */
require_once __DIR__ . '/../vendor/autoload.php';


/**
 *
 * Create slim application
 *
 */
$app = new Slim\App();


/**
 *
 * finally run application
 *
 */
$app->run();
