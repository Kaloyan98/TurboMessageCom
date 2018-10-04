<?php

namespace App;

use App\Interfaces\ProviderInterface;

class App {
	protected $providers = [];
	protected $providerConfigFile = '';

	public function __construct() {
		$this->providerConfigFile = BASE_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'providers.php';
	}

	public function loadProviders() {
		//Get providers classname
		$providersClassName = include_once($this->providerConfigFile);

		//loop throught all providers classname
		foreach ($providersClassName as $proivderClassName) {
			//create an instance of the provider
			$provider = new $proivderClassName;

			// if the provider is not of provider interface skip it
			if ($provider instanceof ProviderInterface) {
				$this->providers[] = $provider;
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