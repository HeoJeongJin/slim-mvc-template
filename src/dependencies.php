<?php

// Fetch DI Container
$container = $app->getContainer();

// Monolog Connect
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor( new Monolog\Processor\UidProcessor() );
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;

    // $this->logger->info("slimapp '/' route");
};

// Eloquent Connect
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['eloquent'] = function($container) use($capsule){
    return $capsule;
};

// PDO Connect
$container['pdo'] = function ($c){
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'].';charset='.$db['charset'],
                    $db['user'], $db['pass']
                  );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// Flash Connect
$container['flash'] = function($c){
    return new \Slim\Flash\Messages();
};

$container['auth'] = function($c){
    return new \App\Auth\Auth($c);
};

// Register Twig View helper
$container['view'] = function($container){

    $settings = $container->get('settings')['twig'];
	$view = new \Slim\Views\Twig( $settings['path'], [
		'cache' => false,
	]);
    
    // Instantiate and add Slim specific extension
    /*
        path_for() - 주어진 경로의 URL을 반환
        base_url() - Uri 객체의 기본 URL을 반환
        is_current_path() - 현재 경로와 같다면 true를 반환
        current_path() - 현재 경로를 렌더링
    */
    $view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));
    
    //$view->getEnvironment()->addGlobal('auth', $container->auth);
    
    $view->getEnvironment()->addGlobal('auth', [
		'check' => $container->auth->check(),
		'user' => $container->auth->user(),
	]);
    
    $view->getEnvironment()->addGlobal('flash', $container->flash);

    $view->getEnvironment()->addGlobal('project', $container->get('settings')['project'] );

    return $view;
};

/***
 *                      _             _ _           
 *                     | |           | | |          
 *       ___ ___  _ __ | |_ _ __ ___ | | | ___ _ __ 
 *      / __/ _ \| '_ \| __| '__/ _ \| | |/ _ \ '__|
 *     | (_| (_) | | | | |_| | | (_) | | |  __/ |   
 *      \___\___/|_| |_|\__|_|  \___/|_|_|\___|_|   
 *                                                  
 *                                                  
 */
$container['AuthController'] = function ($c){
    return new \App\Controllers\Auth\AuthController($c);
};

$container['PasswordController'] = function($container) {
	return new \App\Controllers\Auth\PasswordController($container);
};

$container['HomeController'] = function($container) {
	return new \App\Controllers\Home\HomeController($container);
};


/***
 *           _                         
 *          | |                        
 *       ___| | __ _ ___ ___  ___  ___ 
 *      / __| |/ _` / __/ __|/ _ \/ __|
 *     | (__| | (_| \__ \__ \  __/\__ \
 *      \___|_|\__,_|___/___/\___||___/
 *                                     
 *                                     
 */
$container['validator'] = function($container) {
	return new \App\Validation\Validator;
};

