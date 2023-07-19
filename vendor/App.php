<?php

namespace vendor;

use vendor\abstract\AbstractApp;
use vendor\DB;

class App extends AbstractApp
{
    public string $layout = 'layout.php';
    public string $layout_path = 'view/layout/';
    public string $view_path = 'view/';
    public string $view_folder;
    
    public function __construct(array $db, string $view_folder)
    {
        parent::__construct($db);
        $this->view_folder = $view_folder . '/';
    }
    
    
    public function renderLayout(string $content, string $pageTitle): false|string
    {
        $layout_file = $this->layout_path . $this->layout;
        if (!file_exists($layout_file)) {
            throw new Exception('Layout file not found: ', $layout_file);
        }
        
        try {
            ob_start();
            require $layout_file;
            return ob_get_clean();
        } catch (Exception $e) {
            error_log('Error rendering layout: ' . $e->getMessage());
            return false;
        }
    }
    
    public function render(string $file, string $pageTitle, array $data = []): false|string
    {
        $view_file = $this->view_path . $this->view_folder . $file;
        if (!file_exists($view_file)) {
            throw new Exception('View file not found: ' . $view_file);
        }
        try {
            ob_start();
            extract($data);
            require $view_file;
            return $this->renderLayout(ob_get_clean(), $pageTitle);
        } catch (Exception $e) {
            error_log('Error rendering view: ' . $e->getMessage());
            return false;
        }
    }
}