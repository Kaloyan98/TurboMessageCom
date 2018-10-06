<?php

namespace App\Exceptions;

class ClassMethodNotExisting extends \Exception {
	public function __construct($className = 'undefined', $methodName = 'undefined') {
		parent::__construct("The class {$className} doesn't have a method called {$methodName}");
	}
}