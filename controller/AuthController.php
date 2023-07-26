<?php

use vendor\Controller;
use config\Language;
use config\Config;
use model\AdminModel;

class AuthController extends Controller
{
    
    public function actionLogin()
    {
        $this->layout = 'auth-layout.php';
        if (isset($_POST['auth']) && !empty($_POST['auth'])) {
            $user = $this->db->selectQuery('SELECT * FROM admin AS a
            WHERE a.first_name = \'' . $_POST['auth']['first_name'] . '\' AND a.password_hash = \'' . md5($_POST['auth']['password']) . '\' AND a.`status`');
            if (isset($user[0]) && !empty($user[0])) {
                $_SESSION['admin'] = [
                    'isLogged' => true,
                    'language' => $user[0]['language_type']
                ];
                header('Location: ' . Config::get('siteUrl') . 'order/');
                exit();
            }
        }
        return $this->render('login.php', 'Login');
    }
    
    public function actionLogout()
    {
        unset($_SESSION['admin']);
        header('Location: ' . Config::get('siteUrl') . 'auth/login/');
        exit();
    }
}