<?php
define('_Sdef',TRUE);

session_start();

require_once './vendor/autoload.php';
require 'config.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim([
    'templates.path'=> __DIR__.'/templates',
    'debug'=>true
]);

function my_autoload($className) {
	$baseDir = __DIR__;
	$fileName = $baseDir.DIRECTORY_SEPARATOR;
	$namespace = '';
	if($lastPos = strripos($className,'\\')) {
		$namespace = substr($className,0,$lastPos);
		$className = substr($className,$lastPos+1);
		$fileName .= str_replace('\\',DIRECTORY_SEPARATOR,$namespace).DIRECTORY_SEPARATOR;
	}
	
	$fileName .= strtolower($className).'.php';
	if(file_exists($fileName)) {
		require $fileName;
	}
}

spl_autoload_register('my_autoload');				
					
$app->get('/',function () use ($app) {
	$o = \Controller\AController::getInstance('index');
	$o->execute();
})->name('home');

$app->get('/request-list/(:page)',function ($page = false) use ($app) {
	$o = \Controller\AController::getInstance('list');
	$o->execute(['page' => $page]);
})->conditions(array('page' => '\d+'))->name('request-list');					

$app->map('/request', function() {
	$o = \Controller\AController::getInstance('request');
	$o->execute();
})->via('GET', 'POST')->name('request');

$app->map('/user/:login',function ($login) use ($app) {
	$o = \Controller\AController::getInstance('user');
	$o->execute(['login' => $login]);
})->conditions(['login' => '([a-zA-Z0-9]+)'])->via('GET', 'POST')->name('user');

$app->run();