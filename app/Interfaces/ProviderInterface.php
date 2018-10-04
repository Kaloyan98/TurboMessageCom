<?php

namespace App\Interfaces;

interface ProviderInterface {
	/**
	 * Boot class to be booted
	 * @return @void
	 */
	public function boot();
}