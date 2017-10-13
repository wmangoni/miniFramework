<?php
spl_autoload_register(function ($class_name) {
	
	$file = str_replace('\\', '/', $class_name);

	if (file_exists($file)) {
		require_once $file;
	}

	// if ( file_exists('app/controllers/' . $class_name . '.php') ) {
	// 	echo '1';
	// 	require_once 'app/controllers/' . $class_name . '.php';
	// } else if ( file_exists('app/models/' . $class_name . '.php') ) {
	// 	echo '2';
	// 	require_once 'app/models/' . $class_name . '.php';
	// } else {
	// 	echo '3';
	// 	require_once 'app/services/' . $class_name . '.php';
	// }
});