<?php
return [
	'live' => env('PINGPP_LIVE', false),
	'test_secret_key' => env('PINGPP_SK', ''),
	'live_secret_key' => env('PINGPP_TEXT_SK', ''),
	'public_key_path' => env('PINGPP_PUBLIC_KEY_PATH', ''),
	'private_key_path' => env('PINGPP_PRIVATE_KEY_PATH', ''),
];
