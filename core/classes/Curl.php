<?php

class Curl {

	
	/*__________________________________________
	/*	______ __             ________        
	/*	___  //_/_____ __________  __/____  __
	/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
	/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
	/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
	/*								/____/   🔰 𝟣.𝟢 */

	/**
	 * GET 
	 * @var int
	 */
	const GET = CURLOPT_HTTPGET;

	/**
	 * POST 
	 * @var int
	 */
	const POST = CURLOPT_POST;

	/**
	 * HTTP Basic
	 * @var int
	 */
	const AUTH_BASIC = CURLAUTH_BASIC;

	/**
	 * HTTP Digest
	 * @var int
	 */
	const AUTH_DIGEST = CURLAUTH_DIGEST;

	/**
	 * Timeout
	 * @var int
	 */
	const TIMEOUT = 3;

	/**
	 * User-Agent 
	 * @var string
	 */
	const USER_AGENT = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0';

	/**
	 * User Accept
	 * @var array
	 */
	const WHITELISTED_HEADERS = [
		'Accept',
		'Cache-Control',
		'X-Csrf-Token'
	];

	/**
	 * @param int $method
	 * @param string $url 
	 * @param array|bool $query 
	 * @param array|bool $headers 
	 * @param array|bool $auth HTTP 
	 * @return string|bool
	 */
	final public static function request($method = self::GET, $url, $query = false, $headers = false, $auth = false) {
		if (!in_array($method, [self::GET, self::POST])) {
			return false;
		}

		if (!filter_var($url, FILTER_VALIDATE_URL)) {
			return false;
		}

		$ch = curl_init();

		if ($method === self::GET && !empty($query)) {
			$url = $url . '?' . http_build_query($query);
		} elseif ($method === self::POST) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
		}

		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			$method => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => self::TIMEOUT,
			CURLOPT_USERAGENT => self::USER_AGENT,
		]);

		if (is_array($headers)) {
			$headersParsed = [];

			foreach ($headers as $header => $value) {
				$header = ucwords(strtolower($header), '-');
				if (in_array($header, self::WHITELISTED_HEADERS)) {
					$headersParsed[] = "$header: $value";
				}
			}

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headersParsed);
		}

		if ($auth) {
			foreach ($auth as $option => $value) {
				curl_setopt($ch, $option, $value);
			}
		}

		$res = curl_exec($ch);
		$status = intval(curl_getinfo($ch, CURLINFO_RESPONSE_CODE));

		curl_close($ch);

		if ($status !== 200 || empty($res)) {
			return false;
		}

		return $res;
	}

	/**
	 * @param int $type
	 * @param string $username
	 * @param string $password
	 * @return array|bool
	 */
	final public static function authParams($type = self::AUTH_BASIC, $username, $password) {
		if (!in_array($type, [self::AUTH_BASIC, self::AUTH_DIGEST])) {
			return false;
		}

		if (!is_string($username) || !is_string($password)) {
			return false;
		}

		return [
			CURLOPT_HTTPAUTH => $type,
			CURLOPT_USERPWD => $username . ':' . $password
		];
	}
	private function __construct() {}

}
