<?php

/**
 * PSR-4 Compliant Autoloader
 *
 * This will dynamically load classes from my namespace by resolving the prefix and class name.
 *
 * @param string $class fully qualified class name to a file that needs to be loaded
 * @see https://github.com/deepdivedylan/data-design/blob/master/php/classes/autoload.php
 **/
spl_autoload_register(function($class) {
	$prefix = "Anikitina\\DataDesign";
	// check if $class is from my namespace, if not, stop execution
	$substrLen = strlen($prefix);
	if (strncmp($prefix, $class, $substrLen) !== 0) {
		return;
	}
// get a substing of fully classified class name (full name minus namespace location)
	$className = substr($class, $substrLen);
	if (!empty($className)) {
		// create a new fully qualified file name
		$file = __DIR__ . str_replace("\\", "/", $className) . ".php";
		try {
			if(file_exists($file)) {
				require_once($file);
			}
		} catch (Exception $e) {
			error_log($e->getMessage(), 0);
		}
	}
	else {
		error_log("file name is invalid", 0);
		return;
	}
});
