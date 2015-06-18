<?php

/**
 * application settings
 *
 */

return [

    // View settings
    'view' => [
        'template_path' => __DIR__ . '/templates',
        'twig' => [
            'cache' => __DIR__ . '/cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ],
    ],

    // monolog settings
    'logger' => [
        'name' => 'app',
        'path' => __DIR__ . '/log/app.log',
    ],

    // database settings
    'database' => [
        'dsn' => 'mysql:host=localhost;dbname=sango;charset=utf8',
        'username' => 'root',
        'password' => 'root',
    ],

    // routes.php will be appended one after another
    'installedApps' => [],

    // custom settings can just be appended here as requirements
];
