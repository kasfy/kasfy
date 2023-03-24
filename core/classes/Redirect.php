<?php

final class Redirect {

	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

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
