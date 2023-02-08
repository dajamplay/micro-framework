<?php

namespace App\Support\StringHelper;

class StringHelper
{
    public static function removeUnnecessary(string $string) : string {

        $string = trim($string);
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);

        return $string;
    }
}