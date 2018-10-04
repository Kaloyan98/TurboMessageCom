<?php
define('BASE_DIR', __DIR__);

namespace App;


use App\Interfaces\ProviderInterface;

class App {
	$providers = [];
	$providerConfigFile = '';

	public function __construct() {
		$this->providerConfigFile = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'providers.php';
	}

	public function loadProviders() {
		//Get providers classname
		$providersClassName = include_once($this->providerConfigFile);

		//loop throught all providers classname
		foreach ($providersClassName as $proivderClassName) {
			$provider = new $proivderClassName;

			if ($provider instanceof ProviderInterface) {
				$this->provider[] = $provider;
			}
		}
	}

	/**
	 * Boot the providers
	 * @return [type] [description]
	 */
	public function boot() {
		if (!$this->providers) {
			return;
		}

		// loop providers
		foreach ($this->providers as $provider) {
			// boot the provider
			$provider->boot();
		}
	}
}