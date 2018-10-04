<?php

namespace App\Providers;

use App\Interfaces\ProviderInterface;

class AppProvider implements ProviderInterface
{
	$autoloadDir = '';

	public function __construct() {
		$autoloadDir = BASE_DIR . '../vendor/autoload.php';
	}

	public function boot() {
		include_once($this->autoloadDir);
	}
}

