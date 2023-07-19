<?php

namespace controller;


use model\UserModel;
use vendor\App;

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