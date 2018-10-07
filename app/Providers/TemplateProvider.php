<?php

namespace App\Providers;

use App\Loaders\TemplateLoader;
use App\Interfaces\ProviderInterface;

class TemplateProvider implements ProviderInterface {
	protected $templateConfigFile = '/templates.php';

	public function __construct() {

	}

	public function boot() {
		$templateConfigs = include_once(CONFIG_DIR . $this->templateConfigFile);

		if (!empty($templateConfigs['templateDir'])) {
			TemplateLoader::setTemplateDir($templateConfigs['templateDir']);
		}
	}
}