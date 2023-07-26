<?php

use vendor\Controller;
use config\Language;
use config\Config;
use model\AdminModel;

class LanguageController extends Controller
{
    public function beforeAction()
    {
        if (!isset($_SESSION['admin']['isLogged'])) {
            header('Location: ' . Config::get('siteUrl') . 'auth/login/');
            exit();
        }
    }
    
    public function actionChange($lang)
    {
        $_SESSION['admin']['language'] = $lang;
        
        header('Location: ' . Config::get('siteUrl') . 'order/');
        exit();
    }
}