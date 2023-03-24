<?php

final class Security {

	/**
	 * @param string $str
	 * @return string
	 */
	final public static function escape($str) {
		return htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	private function __construct() {}

}
