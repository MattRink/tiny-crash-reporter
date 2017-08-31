<?php

namespace MattRink\TinyCrashReporter;

/**
 * A minimal crash reporting library for PHP
 */
class TinyCrashReporter
{
    /**
     * The original exception handler, if any. Used to call the original handler after an exception.
     * 
     * @var callable
     */
    private $originalExceptionHandler;

    /**
     * The original error handler, if any. Used to call the original handler after an error.
     * 
     * @var callable
     */
    private $originalErrorHandler;

    /**
     * Create a new Tiny Crash Reporter and setup the handlers.
     * 
     * @return void
     */    
    public function __construct()
    {

        $this->setExceptionHandler();
        $this->setErrorHandler();

    }

    /**
     * Sets the exception handler which outputs the exception as a formatted string.
     * 
     * @return void
     */
    protected function setExceptionHandler()
    {

        $this->originalExceptionHandler = set_exception_handler(function(\Throwable $e) {

            $class = get_class($e);
            $message = $e->getMessage();

            echo "{$class}: {$message}";

            // Pass the exception to any orignal exception handler or rethrow if no original handler
            if ($this->originalExceptionHandler) {
               ($this->originalExceptionHandler)($e);
            } else {
                throw $e;
            }

        });

    }

    /**
     * Sets the error handler which outputs the error as a formatted string.
     * 
     * @return void
     */
    protected function setErrorHandler()
    {

        $this->originalErrorHandler = set_error_handler(function (int $errNo , string $errStr, string $errFile, int $errLine, array $errContext) {

            $file = $errFile;
            $line = $errLine;
            $message = $errStr;

            echo "{$file}:{$line} {$message}";

            if ($this->originalErrorHandler) {
                ($this->originalErrorHandler)($errNo, $errStr, $errFile, $errLine, $errContext);
            }

            return false;

        });

    }

}
