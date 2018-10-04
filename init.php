<?php

define('BASE_DIR', __DIR__);

$app = new App\App();

// load providers
$app->loadProviders();

// boot providers
$app->boot();