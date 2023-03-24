<?php

final class DB {

	/**
	 * PDO 
	 * @var PDO|null
	 */
	private static $dbh = null;

	/**
	 * @return PDO
	 */
	final public static function getInstance() {
		if (self::$dbh === null) {
			$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', Config::DB_HOST, Config::DB_NAME);
			try {
				self::$dbh = new PDO($dsn, Config::DB_USER, Config::DB_PASS, [
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
				]);
			} catch (PDOException $e) {
				error_log($e->getMessage());
				ob_clean();
				die('DATABASE: Connection error.');
			}
		}
		return self::$dbh;
	}

	private function __construct() {}

}
