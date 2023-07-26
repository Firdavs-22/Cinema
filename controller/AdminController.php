<?php

use vendor\Controller;
use config\Language;
use model\AdminModel;
use config\Config;

class AdminController extends Controller
{
    public function beforeAction()
    {
        if (!isset($_SESSION['admin']['isLogged'])) {
            header('Location: ' . Config::get('siteUrl') . 'auth/login/');
            exit();
        }
    }
    
    public function actionIndex()
    {
        $model = new AdminModel($this->db);
        $sql = 'SELECT * FROM admin
                WHERE admin.status != 0';
        $admins = $model->db->selectQuery($sql);
        return $this->render('index.php', Language::get('admin list'), [
            'admins' => $admins
        ]);
    }
    
    public function actionCreate()
    {
        if (isset($_POST['admin']) && !empty($_POST['admin'])) {
            $post = $_POST['admin'];
            $model = new AdminModel($this->db);
            $model->first_name = $post['first_name'];
            $model->last_name = $post['last_name'];
            $model->email = $post['email'];
            $model->phone_number = $post['phone_number'];
            $model->password_pure = $post['password'];
            $model->password_hash = md5($post['password']);
            $model->role = $post['role'];
            $model->language_type = 1;
            $model->status = 1;
            $model->create();
            
            header('Location: ' . Config::get('siteUrl') . 'admin/view/' . $model->id);
            exit();
        }
        
        return $this->render('create.php', Language::get('create　admin'));
    }
    
    public function actionUpdate(int $id)
    {
        $model = new AdminModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            if (isset($_POST['admin']) && !empty($_POST['admin'])) {
                $post = $_POST['admin'];
                $model->first_name = $post['first_name'];
                $model->last_name = $post['last_name'];
                $model->email = $post['email'];
                $model->phone_number = $post['phone_number'];
                $model->password_pure = $post['password'];
                $model->password_hash = md5($post['password']);
                $model->role = $post['role'];
                $model->save();
                
                header('Location: ' . Config::get('siteUrl') . 'admin/view/' . $model->id);
                exit();
            }
            
            return $this->render('update.php', Language::get('update admin'), [
                'model' => $model
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'admin/');
        exit();
    }
    
    public function actionView(int $id)
    {
        $model = new AdminModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            return $this->render('view.php', Language::get('view admin'), [
                'admin' => $model
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'admin/');
        exit();
    }
    
    public function actionDelete(int $id)
    {
        $model = new AdminModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            $model->status = 0;
            $model->save();
        }
        header('Location: ' . Config::get('siteUrl') . 'admin/');
        exit();
    }
}