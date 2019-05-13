<?php

spl_autoload_register(function ($class) {
//Debug::show($class);

	
    $prefix = 'SilverStripe\\Omnipay\\';
    $base_dir = __DIR__ . DIRECTORY_SEPARATOR ;
 
    // Check if the class being loaded is eWAY's
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators and append with .php
    $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

    // If the file exists, require it
    if (is_file($file)) {
        require_once $file;
    }
});