<?php

define('BASE_DIR', __DIR__);
define('CONFIG_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'config');


$app = new App\App();

// load providers
$app->loadProviders();

// boot providers
$app->boot();