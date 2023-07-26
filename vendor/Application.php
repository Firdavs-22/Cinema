<?php

namespace vendor;

use vendor\Router;
use vendor\DataBase;
use vendor\Controller;

class Application
{
    private Router $router;
    private DataBase $db;
    private Controller $controller;
    
    public function __construct($db_config)
    {
        $this->router = new Router();
        $this->db = new DataBase($db_config['host'], $db_config['dbname'], $db_config['username'], $db_config['password']);
    }
    
    public function run()
    {
        $this->router->parseUrl();
        $this->router->parseAction();
        $this->controller = $this->router->callController();
        $this->controller->setDB($this->db);
        $this->controller->setViewFolder($this->router->view_folder);
        echo $this->router->callAction();
    }
    
    public function end()
    {
        $this->db->closeConnection();
    }
}