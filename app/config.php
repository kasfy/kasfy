<?php

final class Config {


/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*                               /____/   🔰 𝟣.𝟢 */

	/**
	 * error_reporting
	 * @var boolean
	 */
	const  APP_NAME = "GitLeaf Minimal MVC";
	/**
	 * error_reporting_and_debug
	 * @var boolean
	 */
	const APP_DEBUG = true;

	/**
	 * server base host
	 * @var string
	 */
	const APP_URL = 'http://localhost/minimal/';

	/**
	 * if has folder path (default '/')
	 */
	const APP_PATH = '/minimal/';

	/**
	 * Database: Host
	 * @var string
	 */
	const DB_HOST = 'localhost';

	/**
	 * Database: user
	 * @var string
	 */
	const DB_USER = 'root';

	/**
	 * Database: password
	 * @var string
	 */
	const DB_PASS = 'macmysql';

	/**
	 * Database: database name
	 * @var string
	 */
	const DB_NAME = 'mvc';

	/**
	 * cookie stored uniqe id
	 * @var string
	 */
	const USER_COOKIE = 'user_id';

	/**
	 * sald for generating random password
	 * @var string
	 */
	const SALT = '34aa3fb2c440cac0b1cdbb49146a2f34';

	/**
	 * private key for generating JWT Token
	 * @var string
	 */
	const PRIVATE_KEY = '34aa3fb2c440cac0b1cdbuhhuofourewsaookatheeshdG';

}
