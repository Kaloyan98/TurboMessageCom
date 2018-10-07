<?php

namespace App\Loaders;

use App\Exceptions\ConfigNotSetException;
use App\Exceptions\TemplateNotFoundException;

class TemplateLoader {
	private static $templateDir;

	private function __construct() {}

	/**
	 * Load a php file with html inside
	 * @param  [string] $templateName [Enter only the name of the php file without the extension]
	 * @param  [array] arguments to pass to the file
	 * @return void
	 */
	public static function loadTemplate($templateName, $args = []) {
		if (!static::$templateDir) {
			throw new ConfigNotSetException('templates', 'templateDir');
		}

		$templateFullPath = static::$templateDir . DIRECTORY_SEPARATOR . $templateName . '.php';

		if (!file_exists($templateFullPath)) {
			throw new TemplateNotFoundException($templateName);
		}

		extract($args);
		include($templateFullPath);
	}

	public static function setTemplateDir($templateDir) {
		static::$templateDir = $templateDir;
	}
}