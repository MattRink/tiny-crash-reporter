<?php

require "vendor/autoload.php";

use MattRink\TinyCrashReporter\TinyCrashReporter;

set_exception_handler(function(\Throwable $e) {
    echo "Moose: {$e->getMessage()}";
});

set_error_handler(function(int $errNo , string $errStr, string $errFile, int $errLine, array $errContext) {

    echo "Moose: {$errFile}:{$errLine} {$errStr}<br/>";

    return false;

});

$reporter = new TinyCrashReporter();

throw new Exception("This is a test");

$i = 1/0;

echo "This is a test.";