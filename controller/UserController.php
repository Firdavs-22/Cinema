<?php

namespace controller;

use model\UserModel;
use vendor\App;

require 'vendor/App.php';
require 'model/UserModel.php';

class UserController extends App
{
    
    public function actionIndex()
    {
        $user = new UserModel($this->database);
        return $this->render('index.php','Doc',[
            'user' => $user
        ]);
    }
}