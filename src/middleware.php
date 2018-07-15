<?php

// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

use Respect\Validation\Validator as v;

// CORS
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

//
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));

//
$app->add(new \App\Middleware\OldInputMiddleware($container));

//
$app->add(new \App\Middleware\CsrfViewMiddleware($container));

//
$app->add(new \App\Middleware\PageConnectMiddleware($container));

//
$container['csrf'] = function($container){
	$guard = new \Slim\Csrf\Guard;
	$guard->setPersistentTokenMode(true); // => ajax 때문에 지속성 모드로 간다..
    return $guard;
};

$app->add($container->csrf);

//
v::with('App\\Validation\\Rules\\');