<?php

use vendor\Controller;
use config\Language;
use model\CategoryModel;
use config\Config;

class CategoryController extends Controller
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
        $model = new CategoryModel($this->db);
        $sql = 'SELECT * FROM category
                WHERE category.status != 0';
        $categories = $model->db->selectQuery($sql);
        return $this->render('index.php', Language::get('category list'), [
            'categories' => $categories
        ]);
    }
    
    public function actionCreate()
    {
        if (isset($_POST['category']) && !empty($_POST['category'])) {
            $post = $_POST['category'];
            $model = new CategoryModel($this->db);
            $model->title_uz = $post['title_uz'];
            $model->title_ru = $post['title_ru'];
            $model->title_eng = $post['title_eng'];
            $model->title_jap = $post['title_jap'];
            $model->status = 1;
            $model->create();
            
            header('Location: ' . Config::get('siteUrl') . 'category/view/' . $model->id);
            exit();
        }
        
        return $this->render('create.php', Language::get('create category'));
    }
    
    public function actionUpdate(int $id)
    {
        $model = new CategoryModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            if (isset($_POST['category']) && !empty($_POST['category'])) {
                $post = $_POST['category'];
                $model->title_uz = $post['title_uz'];
                $model->title_ru = $post['title_ru'];
                $model->title_eng = $post['title_eng'];
                $model->title_jap = $post['title_jap'];
                $model->save();
                
                header('Location: ' . Config::get('siteUrl') . 'category/view/' . $model->id);
                exit();
            }
            
            return $this->render('update.php', Language::get('update category'), [
                'model' => $model
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'category/');
        exit();
    }
    
    public function actionView(int $id)
    {
        $model = new CategoryModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            return $this->render('view.php', Language::get('view category'), [
                'category' => $model
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'category/');
        exit();
    }
    
    public function actionDelete(int $id)
    {
        $model = new CategoryModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            $model->status = 0;
            $model->save();
        }
        header('Location: ' . Config::get('siteUrl') . 'category/');
        exit();
    }
    
   
}