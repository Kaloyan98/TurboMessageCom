<?php

use Illuminate\Database\Capsule\Manager as DatabaseManager;

class TestTable {
	public function __construct() {}

	public function run() {
		DatabaseManager::schema()->create('users', function ($table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->timestamps();
		});
	}
}

return new TestTable();