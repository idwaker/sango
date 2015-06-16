<?php

/**
 * Application Name
 * must match to directory name where bootstrap.php file
 * is located
 */
define('APP_NAME', 'sango');

/**
 * load bootstrap.php file and obtain app object
 *
 */
$app = require __DIR__ . '/../' . APP_NAME . '/bootstrap.php';


/**
 *
 * finally run application
 *
 */
$app->run();
