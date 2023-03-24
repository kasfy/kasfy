<?php

final class Utils {

	use DateUtils, StringUtils;

	/**
	 * @param string $path 
	 * @return string
	 */
	final public static function generateLink($path) {
		return Config::BASE . $path;
	}

	private function __construct() {}

	/**
	 * @param int|string
	 * @return string
	 */
	final public static function formatDateAndTime($ts) {
		if (is_string($ts)) {
			$ts = strtotime($ts);
		}
		return date('H:i:s d.m.Y', $ts);
	}


}
