<?php

namespace App\Providers;

use App\Loaders\ScriptLoader;
use App\Interfaces\ProviderInterface;

class AppProvider implements ProviderInterface
{
	public function __construct() {}

	public function boot() {
		ScriptLoader::addScript('dist/bundle.js', ScriptLoader::FOOTER);
		ScriptLoader::addStyle('resources/css/main.css');

		$dotenv = new \Dotenv\Dotenv(BASE_DIR);
		$dotenv->load();
	}
}

