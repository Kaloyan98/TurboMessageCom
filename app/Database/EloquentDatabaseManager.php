<?php

namespace App\Database;

use Illuminate\Support\Facades\DB;
use App\Interfaces\DatabaseInterface;
use Illuminate\Database\Capsule\Manager as DatabaseManager;

class EloquentDatabaseManager implements DatabaseInterface {
	public function __construct() {}

	public function createTable($name, $columns = []) {
		DatabaseManager::schema()->create($name, function($table) use($columns) {
			if (!$columns) {
				return;
			}

			$this->createTableColumns($table, $columns);
		});

		return $this;
	}

	public function dropTable($name) {
		DatabaseManager::dropIfExists($name);

		return $this;
	}

	public function addColumn($tableName, $columnName, $args = []) {
		DatabaseManager::table($tableName, function($table) use($columns) {
			// default column data
			$columns[$columnName] = $args;

			$this->createTableColumns($table, $columns);
		});

		return $this;
	}

	public function dropColumn($tableName, $columnName) {
		DatabaseManager::table($tableName, function($table) use($columns) {
			$table->dropColumn($columnName);
		});

		return $this;
	}

	public function addColumnsValue($tableName, $columns = []) {
		if (!$columns) {
			return $this;
		}

		DatabaseManager::table($tableName)->insert($columns);
	}

	public function getAllColumnValues($tableName, $columnName) {
		return DatabaseManager::table($tableName)->select($columnName)->get();
	}

	public function hasTable($tableName) {
		// try to select from table
		// if fails it will return an exception
		try {
			DatabaseManager::table($tableName)->selectRaw("1")->get();

			return true;
		} catch (\PDOException $e) {
			return false;
		}
	}

	/**
	 * capsule to create columns
	 * @param  table of elequent
	 * @param  columns to create
	 */
	protected function createTableColumns($table, $columns) {
		if (!$columns) {
			return;
		}
		foreach ($columns as $columnName => $columnData) {
			// set default type of column
			$type = !empty($columnData['type']) ? $columnData['type'] : 'string';

			if ($type === 'timestamps') {
				$table->timestamps();
				return;
			}

			$columnRef = $table->$type($columnName);

			if (!empty($columnData['defaultValue'])) {
				$columnRef->default($columnData['defaultValue']);
			}

			// set nullable
			if (!empty($columnData['null']) && $columnData['null']) {
				$columnRef->nullable();
			}

			// set nullable
			if (!empty($columnData['unique']) && $columnData['unique']) {
				$columnRef->unique();
			}
		}
	}
}