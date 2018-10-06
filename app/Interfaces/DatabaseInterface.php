<?php

namespace App\Interfaces;

interface DatabaseInterface {
	/**
	 * Create Table with name
	 * @param [name] [the name of the table]
	 * @param [columns] [columns to create // name => [defaultValue, type, null = true/false]]
	 * @return self
	 */
	public function createTable($name, $columns = []);

	/**
	 * Drop Table
	 * @param [name] [the name of the table]
	 * @return self
	 */
	public function dropTable($name);

	/**
	 * Add column to table
	 * @param the table name
	 * @param the column name
	 * @param list of arguments // the most commons are defaultValue and type
	 * @return self
	 */
	public function addColumn($tableName, $columnName, $args);

	/**
	 * Drop column to table
	 * @param the table name
	 * @param the column name
	 * @return self
	 */
	public function dropColumn($tableName, $columnName);

	/**
	 * add table column value
	 * @param  the table name
	 * @param  columns [columns that like [name => 'test', 'email' => 'tge@example.com']]
	as long the columns are in table
	 * @return self
	 */
	public function addColumnsValue($tableName, $columns = []);

	/**
	 * Get the table column values
	 * @param  the table name
	 * @param  the column name
	 * @return mixed
	 */
	public function getAllColumnValues($tableName, $columnName);

	/**
	 * Check if table exists
	 * @param $[tableName] [the table name]
	 * @return boolean
	 */
	public function hasTable($tableName);
}