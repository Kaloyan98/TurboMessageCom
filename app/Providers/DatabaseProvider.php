<?php

namespace App\Providers;

use App\DBTableFileManager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Symfony\Component\Finder\Finder;
use App\Interfaces\ProviderInterface;
use Illuminate\Database\Capsule\Manager as DatabaseManager;

class DatabaseProvider implements ProviderInterface
{
	private $tablesDIR = '';

	public function __construct() {
		$this->tablesDIR = BASE_DIR . DIRECTORY_SEPARATOR . 'tables';
	}

	public function boot() {
		$this->bootDatabase();
		$this->loadDatabaseTables();
	}

	private function bootDatabase() {
		$databaseManager = new DatabaseManager;
		$databaseManager->addConnection([
			'driver'    => getenv('DB_DRIVER'),
			'host'      => getenv('HOST'),
			'database'  => getenv('DATABASE'),
			'username'  => getenv('USER'),
			'password'  => getenv('PASS'),
			'charset'   => getenv('CHARSET'),
			'collation' => getenv('COLLATION'),
			'prefix'    => '',
		]);

		$databaseManager->setEventDispatcher(new Dispatcher(new Container));

		// Make this Capsule instance available globally via static methods...
		$databaseManager->setAsGlobal();

		// Setup the Eloquent ORM...
		$databaseManager->bootEloquent();
	}

	private function loadDatabaseTables() {
		$dbTableFileManager = new DBTableFileManager();
		$dbTableFileManager->loadTableChecker();

		// get all tables in
		$finder = new Finder();
		$finder->files()->sortByName()->in($this->tablesDIR);
		// loop throught all files
		// and include the tables
		foreach ($finder as $tableFile) {
			$tableFileNamePath = $tableFile->getRealPath();

			if ($dbTableFileManager->isTableCreated(pathinfo($tableFileNamePath, PATHINFO_FILENAME))) {
				continue;
			}

			// include the table class and run it
			$tableClass = include_once($tableFileNamePath);

			$tableClass->run();
		}
	}
}

