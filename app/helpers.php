<?php

use App\Loaders\TemplateLoader;

function loadTemplate($templateName, $args = []) {
	TemplateLoader::loadTemplate($templateName, $args);
}