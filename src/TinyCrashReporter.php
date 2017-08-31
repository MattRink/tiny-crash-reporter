<?php

namespace MattRink\TinyCrashReporter;

class TinyCrashReporter
{
    
    public function __construct()
    {

        $this->setExceptionHandler();

        $this->setErrorHandler();

    }

    protected function setExceptionHandler()
    {

        set_exception_handler(function(\Throwable $e) {

            $message = $e->getMessage();

            echo $message;

        });

    }

    protected function setErrorHandler()
    {

        set_error_handler(function(int $errno , string $errstr, string $errfile, int $errline, array $errcontext) {

            $message = $errstr;

            echo $message;

        });

    }

}
