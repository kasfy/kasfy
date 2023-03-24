<?php

final class Redirect {

	/**
	 * @param string $link
	 */
	final public static function to($link) {
		ob_clean();
		header('Location: ' . Config::BASE . $link);
		die;
	}

	/**
	 * @param string $link
	 */
	final public static function absolute($link) {
		ob_clean();
		header('Location: ' . $link);
		die;
	}

	private function __construct() {}

}
