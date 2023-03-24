<?php


/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*                               /____/   🔰 𝟣.𝟢 */

spl_autoload_register(function($className) {
	$path = null;
	if (file_exists('./core/classes/' . $className . '.php')) {
		$path = './core/classes/' . $className . '.php';
	} elseif (preg_match('|^(?:[A-Z][a-z]+)+Controller$|', $className)) {
		$path = './app/controllers/' . $className . '.php';
	} elseif (preg_match('|^(?:[A-Z][a-z]+)+Model$|', $className)) {
		$path = './app/models/' . $className . '.php';
	} elseif ($className === 'Config') {
		$path = './app/config.php';
	} else {
		die('AUTOLOAD: Class not found.');
	}

	if (file_exists($path)) {
		require_once $path;
		return true;
	}

	die('AUTOLOAD: File not found.');
});
