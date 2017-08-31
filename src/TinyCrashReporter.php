<?php

namespace MattRink\TinyCrashReporter;

/**
 * A minimal crash reporting library for PHP
 */
class TinyCrashReporter
{


    /**
     * Create a new Tiny Crash Reporter and setup the handlers
     * 
     * @return void
     */    
    public function __construct()
    {

        $this->setExceptionHandler();

        $this->setErrorHandler();

    }

    /**
     * Sets the exception handler whish outputs the exception as a formatted string
     * 
     * @return void
     */
    protected function setExceptionHandler()
    {

        set_exception_handler(function(\Throwable $e) {

            $class = get_class($e);
            $message = $e->getMessage();

            echo "{$class}: {$message}";

        });

    }

    /**
     * Sets the error handler whish outputs the error as a formatted string
     * 
     * @return void
     */
    protected function setErrorHandler()
    {

        set_error_handler(function(int $errno , string $errstr, string $errfile, int $errline, array $errcontext) {

            $file = $errfile;
            $line = $errline;
            $message = $errstr;

            echo "{$errfile}:{$errline} ${$message}";

        });

    }

}
