<?php

return[

    'settings' =>[

        // project info
        'project' => [
            'title' => 'WEB TITLE',
            'description' => 'SLIM MVC TEMPLATE V1',
            'homeFolderName' => 'home',
			'homeFileName' => 'home'
        ],

        'displayErrorDetails' => true,
        'addContentLengthHeader' => true,

        // twig settings
        'twig' => [
            'path' => __DIR__.'/../views/',
        ],
        
        // Monolog
        'logger' => [
            'name' => 'slimapp',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [

            // Eloquent
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'DEVDB',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',

			// PDO
			'host' => '127.0.0.1',
			'dbname' => 'DEVDB',
			'port' => '3306',
			'user' => 'root',
			'pass' => '',
			'charset' => 'utf8',
        ]
    ]
];