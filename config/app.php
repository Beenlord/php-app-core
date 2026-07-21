<?php

$appName = env('APP_NAME', 'art3d');
$appId = env('APP_ID', 100);

return [
	
	'name' => $appName,
	
	'id' => $appId,
	
	'version' => '1.0.0',
	
	'env' => env('APP_ENV', 'production'),
	
	'debug' => (bool)env('APP_DEBUG', false),
	
	'url' => env('APP_URL', "http://localhost:10{$appId}"),
	
	'timezone' => env('APP_TIMEZONE', 'Europe/Moscow'),
	
	'locale' => env('APP_LOCALE', 'ru'),
	
	'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
	
	'faker_locale' => env('APP_FAKER_LOCALE', 'ru_RU'),
	
	'cipher' => 'AES-256-CBC',
	
	'key' => env('APP_KEY'),
	
	'previous_keys' => [
		...array_filter(
			explode(',', env('APP_PREVIOUS_KEYS', ''))
		),
	],
	
	'maintenance' => [
		'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
		'store' => env('APP_MAINTENANCE_STORE', 'database'),
	],

];
