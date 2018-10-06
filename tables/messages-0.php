<?php

use App\Parsers\DatabaseParser;

class MessageTable {
	public function __construct() {}

	public function run() {
		DatabaseParser::createTable('tmc_messages', [
			'id' => [
				'type' => 'increments',
			],
			'text' => [
				'type' => 'string',
				'null' => true,
			],
		]);
	}
}


return new MessageTable;
?>