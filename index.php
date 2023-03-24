<?php


/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*	                             /____/   🔰 𝟣.𝟢 */

require_once './core/autoload.php';

if (Config::APP_DEBUG) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

if (!Config::APP_DEBUG) {
	error_reporting(0);
}

Session::begin();

$request = Http::getRequestedPath();

$routes = require_once './app/routes.php';
$args = $foundRoute = null;
foreach ($routes as $route) {
	if ($route->isMatched($request, $args)) {
		$foundRoute = $route;
		break;
	}
}

$className = $foundRoute->getController();
$worker = new $className;

if (method_exists($worker, '__pre')) {
	call_user_func([$worker, '__pre']);
}

if (!method_exists($worker, $foundRoute->getMethod())) {
	ob_clean();
	die('CONTROLLER: Method not found.');
}
$methodName = $foundRoute->getMethod();
call_user_func_array([$worker, $methodName], $args);

if (method_exists($worker, '__post')) {
	call_user_func([$worker, '__post']);
}

$DATA = $worker->getData();

$view = './app/views/' . str_replace('Controller', '', $foundRoute->getController()) . '/' . $foundRoute->getMethod() . '.php';

if (!file_exists($view)) {
	ob_clean();
	die('VIEW: Main template file not found.');
}

$jsModule = sprintf('assets/js/modules/%s_%s.js', $foundRoute->getController(), $foundRoute->getMethod());
if (file_exists($jsModule)) {
	$DATA['JAVASCRIPT_MODULE'] = $jsModule;
}

function __layout($layout, $DATA) {
	$layoutview = './app/views/__layout/' . $layout .'.php';
	if (!file_exists($layoutview)) {
		ob_clean();
		die('VIEW: Header file not found.');
	}
	require_once $layoutview;
}

function dump($variable){
    echo '<pre style="background-color: #210000;color: #2ae222;padding: 2em;border-radius: 1em;">';
    die(var_dump($variable));
    echo '</pre>';
	die();
}

require_once $view;
