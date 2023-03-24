<?php

final class Auth {

	/**
	 * @var array
	 */
    private static $USER = null;

	/**
	 * store logged user data
	 * @param array $user 
	 * @return nothing 
	 */
	final public static function set($user) {
        if (self::$USER === null) {
			try {
				self::$USER = $user;
			} catch (PDOException $e) {
				error_log($e->getMessage());
				ob_clean();
				die('Auth: Login error.');
			}
		}
	}

    /**
	 * return logged user data
	 * @return array 
	 */
	final public static function user() {
		return self::$USER;
	}

	private function __construct() {}

}
