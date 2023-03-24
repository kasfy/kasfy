<?php

final class Http {


	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * HTTP GET
	 * @return bool
	 */
	final public static function isGet() {
		$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
		$method = strtoupper($method);
		return $method === 'GET';
	}

	/**
	 * HTTP POST 
	 * @return bool
	 */
	final public static function isPost() {
		$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
		$method = strtoupper($method);
		return $method === 'POST';
	}

	/** 
	 * @param string|array $method  'GET', 'GET|HEAD', 'GET|HEAD|POST'
	 * @return void
	 */
	final public static function checkMethodIsAllowed($allowedMethods = 'GET') {
		$allowedMethods = explode('|', $allowedMethods);
		$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

		foreach ($allowedMethods as $method) {
			$method = strtoupper($method);
			if ($method === $requestMethod) {
				return;
			}
		}

		http_response_code(405);
		ob_clean();
		die('HTTP: 405 method not allowed.');
	}

	/**
	 * @see http://php.net/manual/en/reserved.variables.server.php
	 * @return bool
	 */
	final public static function isHttps() {
		$c1 = filter_input(INPUT_SERVER, 'HTTPS') !== null;
		$c2 = filter_input(INPUT_SERVER, 'SERVER_PORT', FILTER_SANITIZE_NUMBER_INT);
		$c2 = intval($c2) === 443;

		if ($c1 || $c2) {
			return true;
		}
		return false;
	}

	/**
	 * @return string
	 */
	final public static function getRequestedPath() {
		$request = filter_input(INPUT_SERVER, 'REQUEST_URI');
		$request = substr($request, strlen(Config::APP_PATH));
		return $request;
	}

	/**
	 * @return void
	 */
	final public static function setJsonHeaders() {
		header('Content-Type: application/json; charset=utf-8');
		// header('Access-Control-Allow-Origin: *');
	}
	
	private function __construct() {}

}
