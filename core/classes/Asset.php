<?php

final class Asset {
	/**
	 * @param string $path 
	 * @return string
	 */
	final public static function link($path) {
		return Config::APP_URL . $path;
	}

	private function __construct() {}

}