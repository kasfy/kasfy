<?php

final class Session {

	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * @var array
	 */
	private static $cookieParams = [
		'lifetime' => 0,
		'path' => '/',
		'domain' => '',
		'secure' => false,
		'httponly' => true,
		'samesite' => 'Strict'
	];

	/**
	 * @return void
	 */
	final public static function begin() {
		if (Http::isHttps()) {
			self::$cookieParams['secure'] = true;
		}

		if (!session_set_cookie_params(self::$cookieParams)) {
			ob_clean();
			die('SESSION: Unable to set cookie params.');
		}
		session_start();
	}

	/**
	 * @return void
	 */
	final public static function end() {
		$_SESSION = [];
		session_destroy();
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	final public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	/**
	 * @param string $key
	 * @return mixed|boolean
	 */
	final public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return false;
	}

	private function __construct() {}

}
