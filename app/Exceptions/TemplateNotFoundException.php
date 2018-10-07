<?php

namespace App\Exceptions;

class TemplateNotFoundException extends \Exception {
	public function __construct($templateName) {
		parent::__construct("Template {$templateName} not found!");
	}
}