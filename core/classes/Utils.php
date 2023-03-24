<?php

final class Utils {

	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

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
