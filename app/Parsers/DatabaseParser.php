<?php

namespace App\Parsers;

use App\Exceptions\ConfigNotSetException;
use App\Exceptions\ClassMethodNotExisting;

class DatabaseParser {
	private $databaseConfigFile = '/config/database.php';
	private $databaseInstance = null;

	// static cached instance
	private static $instance;

	public function __construct() {
		$config = include(BASE_DIR . $this->databaseConfigFile);

		if (empty($config['databaseClass'])) {
			throw new ConfigNotSetException('database', 'databaseClass');
		}

		// create the database instance
		$this->databaseInstance = new $config['databaseClass'];
	}

	public function getDBInstance() {
		return $this->databaseInstance;
	}

	//call the database instance
	public function __call($name, $arguments) {
		if (!method_exists($this->databaseInstance, $name)) {
			throw new ClassMethodNotExisting($this->databaseInstance, $name);
		}

		return call_user_func_array(array($this->databaseInstance, $name), $arguments);
	}

	//call the database instance
	public static function __callStatic($name, $arguments) {
		static::$instance = new static;

		return call_user_func_array(array(static::$instance, $name), $arguments);
	}
}