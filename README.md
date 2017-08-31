# A minimal crash reporting library for PHP

The `mattrink/tiny-crash-reporter` library gracefully handles PHP errors and exception returning pretty single line error messages.

## Installation

You can install the package via composer:

``` bash
composer require spatie/laravel-activitylog
```

## Usage

Usage is very simple, once installed ensure that composer's autoload.php file is included, add the class `use MattRink\TinyCrashReporter\TinyCrashReporter;` and create a new instance of `TinyCrashReporter`.

```php
require "vendor/autoload.php";

use MattRink\TinyCrashReporter\TinyCrashReporter;

$reporter = new TinyCrashReporter();
```
