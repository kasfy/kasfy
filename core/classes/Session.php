<?php

final class Session {

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
