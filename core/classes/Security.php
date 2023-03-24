<?php

final class Security {


	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * @param string $str
	 * @return string
	 */
	final public static function escape($str) {
		return htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	private function __construct() {}

}
