<?php

namespace vendor\abstract;

use vendor\DataBase;

abstract class AbstractController
{
    public DataBase $db;
    private string $view_folder;
    
    abstract public function render(string $file, string $pageTitle, array $data = []): false|string;
    
    abstract public function renderLayout(string $content, string $pageTitle): false|string;
    
    abstract public function setDB(DataBase $db): void;
    abstract public function setViewFolder(string $view_path): void;
    
}