<?php

namespace App\Provider;

class Provider
{
	const HEADER = 'header';
	const FOOTER = 'footer';

	$scripts = [];

	// skip constructor
	public function __construct() {}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path ./src/sd.js]
	 * @param [string] $position
	 */
	public static function addScript($filename, $position = static::HEADER) {
		$scripts[] = $filepath;
	}

	/**
	 * Add script to any position you want
	 * either Header or Footer
	 * @param [string] $filename [add relative path ./src/sd.js]
	 */
	public static function addStyle($filename) {
		$scripts[] = $filepath;
	}
}

