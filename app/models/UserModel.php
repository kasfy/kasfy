<?php

class UserModel extends Model {

	
	/**
	 * defined table name
	 * @var string
	 */
	protected static $tableName = 'users';

	/**
	 * @param string $email Е-mail
	 * @param string $password Password
	 * @return object
	 */
	public static function getByEmailAndPassword($email, $password) {
		$tableName = '`' . self::$tableName . '`';
		$tableName = sprintf('`%s`', self::$tableName);

		$sql = "SELECT * FROM $tableName WHERE `email` = ? AND `password` = ? LIMIT 1;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, $email, PDO::PARAM_STR);
		$pst->bindValue(2, $password, PDO::PARAM_STR);
		$pst->execute();

		return $pst->fetch();
	}

}


/*__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*								/____/   🔰 𝟣.𝟢 */
