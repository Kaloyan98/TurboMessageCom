<?php
namespace App\Loaders;

class ScriptLoader
{
	const HEADER = 'header';
	const FOOTER = 'footer';

	private static $scripts = [];
	private static $styles = [];

	// skip constructor
	public function __construct() {}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path of base dir src/sd.js]
	 * @param [string] $position
	 */
	public static function addScript($filename, $position = self::HEADER) {
		static::$scripts[$position][] = $filename;
	}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path ./src/sd.js]
	 */
	public static function addStyle($filename) {
		static::$styles[] = $filename;
	}

	/**
	 * Init all the scripts
	 * @param  [type] $position [description]
	 * @return [type]           [description]
	 */
	public static function initScripts($position = self::HEADER) {
		// init styles
		$app_url = getenv('APP_URL');

		if ($position === self::HEADER) {
			foreach (static::$styles as $style) {
				printf('<link rel="stylesheet" href="%s" />', $app_url . $style);
			}
		}

		// init scripts
		if (!array_key_exists($position, static::$scripts)) {
			return;
		}

		foreach (static::$scripts[$position] as $script) {
			printf('<script src="%s"></script>', $app_url . $script);
		}
	}
}

