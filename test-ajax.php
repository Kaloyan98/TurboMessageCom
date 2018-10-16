<?php
include_once(__DIR__ . '/vendor/autoload.php');
include_once(__DIR__ . '/init.php');

var_dump( $_POST );
if (!empty($_POST['message'])) {
	\App\Models\Message::create([
		'text' => $_POST['message']
	]);
}