<?php

namespace vendor;


use MongoDB\BSON\ObjectId;

class Router
{
    private array $parsed_url;
    private string $controller_class = 'SiteController';
    private string $action = 'ActionIndex';
    private string $controller_file = 'SiteController.php';
    private string $controller_directory = 'controller';
    public string $view_folder = 'site';
    
    public object $controller;
    
    private array $params = [];
    
    public function parseUrl(): void
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace('index.php', '', $url);
        $url = trim($url, '/');
        $this->parse_url = explode('/', $url);
    }
    
    public function parseAction(): void
    {
        if (isset($this->parse_url[0]) && !empty($this->parse_url[0]) && strlen($this->parse_url[0]) > 0) {
            $this->view_folder = $this->parse_url[0] . '/';
            $this->controller_class = ucfirst($this->parse_url[0]) . 'Controller';
            $this->controller_file = $this->controller_class . '.php';
        }
        if (isset($this->parse_url[1]) && !empty($this->parse_url[1]) && strlen($this->parse_url[1]) > 0) {
            $this->action = 'Action' . ucfirst($this->parse_url[1]);
        }
        
        if (isset($this->parse_url[2])) {
            $this->params = $this->parse_url;
            array_splice($this->params, 0, 2);
            
        }
    }
    
    public function callController(): object
    {
        if (file_exists($this->controller_directory . '/' . $this->controller_file)) {
            require_once $this->controller_directory . '\\' . $this->controller_file;
            
            $this->controller = new ($this->controller_class);
            if (!method_exists($this->controller, $this->action)) {
                $this->errorNotFound();
            }
            
            return $this->controller;
        }
        $this->errorNotFound();
        exit();
    }
    
    private function errorNotFound(): void
    {
        echo '<h1><b>404</b> error page not found</h1>';
        exit();
    }
    
    public function callAction(): string
    {
        $this->controller->beforeAction();
        return call_user_func_array([$this->controller, $this->action], $this->params);
    }
}



