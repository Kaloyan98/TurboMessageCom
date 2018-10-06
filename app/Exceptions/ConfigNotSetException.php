<?php

namespace App\Exceptions;

class ConfigNotSetException extends \Exception {
	public function __construct($fileName = 'undefined', $propertyName = 'undefined') {
		parent::__construct("Property {$propertyName} not set in {$fileName}");
	}
}