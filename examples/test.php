<?php

require "../vendor/autoload.php";

use MattRink\TinyCrashReporter\TinyCrashReporter;

// Set a exception handler outside of TinyCrashReporter
set_exception_handler(function(\Throwable $e) {
    echo "Moose: {$e->getMessage()}";
});

// Set a error handler outside of TinyCrashReporter
set_error_handler(function(int $errNo , string $errStr, string $errFile, int $errLine, array $errContext) {

    echo "Moose: {$errFile}:{$errLine} {$errStr}<br/>";

    return false;

});

// Create an instance
$reporter = new TinyCrashReporter();

// Throw an exception
throw new Exception("This is a test");

// Or a notice 
$i = 1/0;

echo "This is a test.";