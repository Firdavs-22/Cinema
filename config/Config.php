<?php

namespace config;

class Config
{
    private static array $config = [
        'siteName' => 'Cinema',
        'siteUrl' => 'http://cinema.loc/index.php/',
        'siteBasePath' => 'http://cinema.loc/',
    ];
    
    public static function get($key)
    {
        return self::$config[$key] ?? null;
    }
    
}