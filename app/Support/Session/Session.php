<?php

namespace App\Support\Session;

class Session
{
    public const SESSION_FLASH = '_session_flash_';

    public static function put(string $name, string $value): void
    {
        $_SESSION[$name] = $value;
    }

    public static function putFlash(string $name, string $value): void
    {
        $_SESSION[self::SESSION_FLASH][$name] = $value;
    }

    public static function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public static function hasFlash(string $name): bool
    {
        return isset($_SESSION[self::SESSION_FLASH][$name]);
    }

    public static function delete(string $name): void
    {
        if (isset($_SESSION[$name])) unset($_SESSION[$name]);
    }

    public static function resetFlash(): void
    {
        if (isset($_SESSION[self::SESSION_FLASH])) unset($_SESSION[self::SESSION_FLASH]);
    }

    public static function get(string $name): string|null
    {
        return $_SESSION[$name] ?: null;
    }

    public static function getFlash(string $name): string|null
    {
        return $_SESSION[self::SESSION_FLASH][$name] ?: null;
    }

    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
    }
}