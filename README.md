# A minimal crash reporting library for PHP

The `mattrink/tiny-crash-reporter` library gracefully handles PHP errors and exception returning single line error messages before continuing execution. No dependencies or extra libraries required. TinyCrashReporter will continue after handling the error or execution as if it was never there, meaning that the exception or error will still continue to bubble up.

## Requirements

TinyCrashReporter only requires PHP 7, nothing more and nothing less.

## Installation

You can install the package via composer:

``` bash
composer require mattrink/tiny-crash-reporter
```

## Usage

Usage is very simple, once installed ensure that composer's autoload.php file is included, add the class `use MattRink\TinyCrashReporter\TinyCrashReporter;` and create a new instance of `TinyCrashReporter`.

```php
require "vendor/autoload.php";

use MattRink\TinyCrashReporter\TinyCrashReporter;

$reporter = new TinyCrashReporter();
```

From this point all exceptions and errors will be handled by TinyCrashHandler before calling any original handler if defined. All errors will be passed through and exceptions will be rethrown if no handler exists.