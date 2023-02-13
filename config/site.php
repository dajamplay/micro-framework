<?php

$env = "dev";

if ($env == "dev") {

    return [
        'env' => 'dev',
        'price' => true,
        'price_opt' => true,
        'display_errors' => 1,
        'display_startup_errors' => 1,
        'error_reporting' => E_ALL,
        'home_url' => 'http://e.loc',
    ];
} else {

    return [
        'env' => 'prod',
        'price' => false,
        'price_opt' => false,
        'display_errors' => 0,
        'display_startup_errors' => 0,
        'error_reporting' => 0,
        'home_url' => 'https://eleanta.ru'
    ];
}



