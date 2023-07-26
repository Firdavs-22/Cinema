<?php

namespace vendor;

use vendor\abstract\AbstractController;
use config\Config;

class Controller extends AbstractController
{
    public string $layout = 'layout.php';
    public string $layout_path = 'view/layout/';
    public string $view_path = 'view/';
    public string $view_folder = 'site/';
    public string $assets_folder = 'assets/';
    public string $css_folder = 'css/';
    
    public string $js_folder = 'js/';
    
    public array $cssFiles = [];
    
    public array $jsFiles = [];
    
    public function beforeAction()
    {
    
    }
    
    public function registerCss($cssFile)
    {
        $this->cssFiles[] = $cssFile;
    }
    
    public function registerJs($jsFile)
    {
        $this->jsFiles[] = $jsFile;
    }
    
    public function renderCssFiles()
    {
        foreach ($this->cssFiles as $cssFile) {
            echo "<link rel='stylesheet' href='" . Config::get('siteBasePath') . $this->assets_folder . $this->css_folder . $cssFile . ".css'>";
        }
    }
    
    public function renderJsFiles()
    {
        foreach ($this->jsFiles as $jsFile) {
            echo "<script src='" . Config::get('siteBasePath') . $this->assets_folder . $this->js_folder . $jsFile . ".js'></script>";
        }
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
    
    public function setDB(DataBase $db): void
    {
        $this->db = $db;
    }
    
    public function setViewFolder(string $view_folder): void
    {
        $this->view_folder = $view_folder;
    }
}