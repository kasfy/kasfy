<?php

final class Crypto {

	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * @var string
	 */
	private static $algo = 'aes-256-cbc';

	/**
	 * SHA-512 encryption
	 * @param string $password
	 * @param bool $salt
	 * @return string 
	 */
	final public static function sha512($password, $salt = false) {
		if ($salt) {
			return hash('sha512', $password . Config::SALT);
		} else {
			return hash('sha512', $password);
		}
	}

	/**
	 * @param string $plainText
	 * @param string $key 
	 * @param string $iv
	 * @return string
	 */
	final public static function encrypt($plainText, $key, $iv = false) {
		$cipherText = openssl_encrypt($plainText, self::$algo, $key, OPENSSL_RAW_DATA, $iv);
		return base64_encode($cipherText);
	}

	/**
	 * @param string $cipherTextEncoded 
	 * @param string $key
	 * @param string $iv 
	 * @return string
	 */
	final public static function decrypt($cipherTextEncoded, $key, $iv = false) {
		$cipherText = base64_decode($cipherTextEncoded);
		$decrypted = openssl_decrypt($cipherText, self::$algo, $key, OPENSSL_RAW_DATA, $iv);
		return $decrypted;
	}

	private function __construct() {}

}
