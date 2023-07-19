<?php

namespace model;

use vendor\DB;

abstract class AbstractApp
{
    protected DB $database;
    
    public function __construct(array $db)
    {
        $this->database = new DB($db['host'], $db['dbname'], $db['username'], $db['password']);
    }
    
    abstract public function render(string $file, string $pageTitle, array $data = []): false|string;
    
    abstract public function renderLayout(string $content, string $pageTitle): false|string;
}