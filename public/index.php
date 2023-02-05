<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app/helpers.php';

ini_set('display_errors', config('site.display_errors'));
ini_set('display_startup_errors', config('site.display_startup_errors'));
ini_set('error_reporting', config('site.error_reporting'));

require __DIR__ . '/../bootstrap/app.php';
