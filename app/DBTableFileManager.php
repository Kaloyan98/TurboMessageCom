<?php

namespace App;

use App\Parsers\DatabaseParser;

class DBTableFileManager {
	private $tablesCreated = [];
	private $tableName = 'tables_created';

	public function __construct() {}

	public function loadTableChecker() {
		if(!DatabaseParser::hasTable($this->tableName)) {
			$this->createWatchTable();
		}

		$this->tablesCreated = DatabaseParser::getAllColumnValues($this->tableName, 'filename')->all();
	}

	public function isTableCreated($tableFileName) {
		// add column value
		if (!$this->tablesCreated) {
			DatabaseParser::addColumnsValue($this->tableName, [
				'filename' => $tableFileName,
			]);

			return false;
		}

		$created = false;

		foreach ($this->tablesCreated as $tableCreateData) {
			if ($tableFileName === $tableCreateData->filename) {
				$created = true;
				break;
			}
		}

		if (!$created) {
			DatabaseParser::addColumnsValue($this->tableName, [
				'filename' => $tableFileName,
			]);
		}

		return $created;
	}

	protected function createWatchTable() {
		DatabaseParser::createTable($this->tableName, [
			'id' => [
				'type' => 'increments',
			],
			'filename' => [
				'type' => 'string',
			]
		]);
	}
}