<?php

use vendor\Controller;
use config\Language;
use model\MovieModel;
use model\CategoryModel;
use model\MovieCategoryModel;
use config\Config;

class MovieController extends Controller
{
    public function beforeAction()
    {
        if (!isset($_SESSION['admin']['isLogged'])) {
            header('Location: ' . Config::get('siteUrl') . 'auth/login/');
            exit();
        }
    }
    public function convertToHourMinute($minutes)
    {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        if ($minutes != 0) {
            return sprintf('%2dh %02dm', $hours, $minutes);
        }
        return sprintf('%2dh', $hours);
    }
    
    public function actionIndex()
    {
        $model = new MovieModel($this->db);
        $sql = 'SELECT * FROM movie
                WHERE movie.status != 0';
        $movies = $model->db->selectQuery($sql);
        
        
        return $this->render('index.php', Language::get('movie list'), [
            'movies' => $movies
        ]);
    }
    
    public function actionCreate()
    {
        if (isset($_POST['movie']) && !empty($_POST['movie']) && isset($_FILES["image"])) {
            $post = $_POST['movie'];
            $model = new MovieModel($this->db);
            $model->title_uz = $post['title_uz'];
            $model->title_ru = $post['title_ru'];
            $model->title_eng = $post['title_eng'];
            $model->title_jap = $post['title_jap'];
            $model->description_uz = $post['description_uz'];
            $model->description_ru = $post['description_ru'];
            $model->description_eng = $post['description_eng'];
            $model->description_jap = $post['description_jap'];
            $model->duration = $post['duration'];
            $model->created_date = date('Y-m-d H:i:s');
            $model->status = 1;
            
            $targetDir = str_replace('controller', 'images', __DIR__);
            $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
            $file = time() . '.' . $imageFileType;
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . '/' . $file);
            $model->img = $file;
            $model->create();
            
            if (isset($post['categories']) && !empty($post['categories'])) {
                foreach ($post['categories'] as $category_id) {
                    $category = new MovieCategoryModel($this->db);
                    $category->category_id = $category_id;
                    $category->movie_id = $model->id;
                    $category->status = 1;
                    $category->create();
                }
            }
            
            header('Location: ' . Config::get('siteUrl') . 'movie/view/' . $model->id);
            exit();
        }
        
        $model = new CategoryModel($this->db);
        $sql = 'SELECT * FROM category
                WHERE category.status != 0';
        $categories = $model->db->selectQuery($sql);
        
        return $this->render('create.php', Language::get('create movie'), [
            'categories' => $categories
        ]);
    }
    
    public function actionUpdate(int $id)
    {
        $model = new MovieModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            if (isset($_POST['movie']) && !empty($_POST['movie'])) {
                $post = $_POST['movie'];
                $model->title_uz = $post['title_uz'];
                $model->title_ru = $post['title_ru'];
                $model->title_eng = $post['title_eng'];
                $model->title_jap = $post['title_jap'];
                $model->description_uz = $post['description_uz'];
                $model->description_ru = $post['description_ru'];
                $model->description_eng = $post['description_eng'];
                $model->description_jap = $post['description_jap'];
                $model->duration = $post['duration'];
                if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
                    $targetDir = str_replace('controller', 'images', __DIR__);
                    $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
                    $file = time() . '.' . $imageFileType;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . '/' . $file);
                    $model->img = $file;
                }
                $model->save();
                
                if (isset($post['categories']) && !empty($post['categories'])) {
                    $sql = 'UPDATE movie_category AS mc SET mc.`status` = 0 WHERE mc.movie_id = ' . $model->id;
                    $this->db->updateQuery($sql);
                    foreach ($post['categories'] as $category_id) {
                        $sql = 'UPDATE movie_category AS mc SET mc.`status` = 1 WHERE mc.movie_id = ' . $model->id . ' AND mc.category_id = ' . $category_id;
                        if ($this->db->updateQuery($sql) == 0) {
                            $category = new MovieCategoryModel($this->db);
                            $category->category_id = $category_id;
                            $category->movie_id = $model->id;
                            $category->status = 1;
                            $category->create();
                        }
                    }
                }
                
                header('Location: ' . Config::get('siteUrl') . 'movie/view/' . $model->id);
                exit();
            }
            $categories = new CategoryModel($this->db);
            $sql = 'SELECT c.*, CASE WHEN mc.category_id IS NOT NULL THEN 1 ELSE 0 END AS have_category
                    FROM category AS c
                    LEFT JOIN movie_category AS mc ON mc.category_id = c.id AND mc.movie_id = ' . $model->id . ' AND mc.`status` = 1
                    WHERE c.`status` = 1 ';
            
            return $this->render('update.php', Language::get('update movie'), [
                'model' => $model,
                'categories' => $model->db->selectQuery($sql)
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'movie/');
        exit();
    }
    
    public function actionView(int $id)
    {
        $model = new MovieModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            return $this->render('view.php', Language::get('view movie'), [
                'movie' => $model,
                'categories' => $this->db
                    ->selectQuery('SELECT * FROM movie_category AS mc
                                INNER JOIN category AS c
                                ON c.id = mc.category_id
                                WHERE mc.movie_id = ' . $model->id . ' AND mc.`status` = 1')
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'category/');
        exit();
    }
}