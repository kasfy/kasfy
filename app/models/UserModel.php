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



// CREATE TABLE `users` (
// 	`id` int UNSIGNED NOT NULL,
// 	`username` varchar(32) NOT NULL,
// 	`firstname` varchar(16) NOT NULL,
// 	`lastname` varchar(16) NOT NULL,
// 	`email` varchar(64) NOT NULL,
// 	`password` char(128) NOT NULL,
// 	`email_verified_at` timestamp NULL,
// 	`provider` varchar(64) NULL,
// 	`provider_id` varchar(64) NULL,
// 	`avatar` varchar(128) NULL,
// 	`bio` text NULL,
// 	`location` varchar(64) NULL,
// 	`company` varchar(64) NULL,
// 	`website` varchar(64) NULL,
// 	`checkState` BOOLEAN NULL DEFAULT FALSE,
// 	`isStaff` BOOLEAN NULL DEFAULT FALSE,
// 	`isDeveloper` BOOLEAN NULL DEFAULT FALSE,
// 	`isBeta` BOOLEAN NULL DEFAULT FALSE,
// 	`isPrivate` BOOLEAN NULL DEFAULT FALSE,
// 	`isFlagged` BOOLEAN NULL DEFAULT FALSE,
// 	`isSuspended` BOOLEAN NULL DEFAULT FALSE,
// 	`lastIP` varchar(64) NULL,
// 	`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
  
// ALTER TABLE `users` ADD `isAdmin` TINYINT(1) NOT NULL DEFAULT '0' AFTER `checkState`;

//   INSERT INTO `users` (`id`, `email`, `username`, `firstname`, `lastname`, `password`, `created_at`) VALUES
//   (1, 'katheesh@mail.com', 'Katheesh', 'Kathees', 'Kumar', '8a09fc6c715ced898b1eda73b95687f101ed849bb52becdfaa4f03189eadf2b4c673ea61a6d199710d0fc95ecdb49f9dcb31b733188fe5ef62caefe151a34683', '2022-10-19 15:55:50'),
//   (2, 'user@mail.com','Sample', 'Sample', 'User', '8a09fc6c715ced898b1eda73b95687f101ed849bb52becdfaa4f03189eadf2b4c673ea61a6d199710d0fc95ecdb49f9dcb31b733188fe5ef62caefe151a34683', '2022-10-19 15:55:50');
  

//   ALTER TABLE `users`
// 	ADD PRIMARY KEY (`id`),
// 	ADD UNIQUE KEY `username` (`username`),
// 	ADD UNIQUE KEY `email` (`email`);