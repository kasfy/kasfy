<?php

abstract class Model {


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
	protected static $tableName = null;

	/**
	 * @return string
	 */
	protected static function getTableName() {
		if (!empty(static::$tableName)) {
			return static::$tableName;
		}

		ob_clean();
		die('MODEL: Table name not defined.');
	}

	/**
	 * <code>
	 * 	Model::getAll();
	 * </code>
	 * @return array
	 */
	public static function getAll() {

		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "SELECT * FROM $tableName;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->execute();

		return $pst->fetchAll();
	}

	/**
	 * <code>
	 * 	Model::getById($id);
	 * </code>
	 * @param int $id ID
	 * @return object|bool
	 */
	public static function getById($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "SELECT * FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);
		$pst->execute();

		return $pst->fetch();
	}

	/**
	 * <code>
	 * 	Model::create([
	 * 		'field_1' => 'value_1',
	 * 		'field_2' => 'value_2'
	 * 	]);
	 * </code>
	 * @param array $data
	 * @return int|bool
	 */
	public static function create($data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $placeholders = $values = [];

		if (!is_array($data) || empty($data)) {
			ob_clean();
			die('MODEL: Bad input for create.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field`";
			$values[] = $value;
			$placeholders[] = '?';
		}

		$fields = '(' . implode(', ', $fields) . ')';
		$placeholders = '(' . implode(', ', $placeholders) . ')';

		$sql = "INSERT INTO $tableName $fields VALUES $placeholders;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		if (!$pst->execute($values)) {
			return false;
		}

		return DB::getInstance()->lastInsertId();
	}

	/**
	 * <code>
	 * 	Model::update($id, [
	 * 		'field_1' => 'value_1',
	 * 		'field_2' => 'value_2'
	 * 	]);
	 * </code>
	 * @param int $id ID
	 * @param array $data
	 * @return bool
	 */
	public static function update($id, $data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $values = [];

		if (!is_array($data) || empty($data)) {
			ob_clean();
			die('MODEL: Bad input for update.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field` = ?";
			$values[] = $value;
		}

		$fields = implode(', ', $fields);
		$values[] = intval($id);

		$sql = "UPDATE $tableName SET $fields WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		return $pst->execute($values);
	}

	/**
	 * <code>
	 * 	Model::delete($id);
	 * </code>
	 * @param int $id ID
	 * @return bool
	 */
	public static function delete($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "DELETE FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);

		return $pst->execute();
	}

	private function __construct() {}

}
