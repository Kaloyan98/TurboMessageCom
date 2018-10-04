<?php

namespace App\Provider;

use App\Interfaces\ProviderInterface;

class ScriptProvider implements ProviderInterface
{
	const HEADER = 'header';
	const FOOTER = 'footer';

	$scripts = [];

	// skip constructor
	public function __construct() {}

	public function boot() {
		//  for not boot nothing
	}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path ./src/sd.js]
	 * @param [string] $position
	 */
	public static function addScript($filename, $position = static::HEADER) {
		$scripts[] = $filename;
	}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path ./src/sd.js]
	 */
	public static function addStyle($filename) {
		$scripts[] = $filename;
	}
}

