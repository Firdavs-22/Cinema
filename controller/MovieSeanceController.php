<?php

use vendor\Controller;
use config\Language;
use model\MovieSeanceModel;
use model\CategoryModel;
use model\MovieCategoryModel;
use model\HallModel;
use model\MovieModel;
use config\Config;

class MovieSeanceController extends Controller
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
        $model = new MovieSeanceModel($this->db);
        $sql = 'SELECT
                  ms.id,
                  ms.seance_date,
                  ms.price,
                  ms.language_type,
                  m.title_uz,
                  m.title_ru,
                  m.title_eng,
                  m.title_jap,
                  m.duration,
                  h.title
                FROM movie_seance AS ms
                INNER JOIN movie AS m
                ON ms.movie_id = m.id
                INNER JOIN hall AS h
                ON h.id = ms.hall_id
                WHERE ms.seance_date > DATE_ADD(NOW(), INTERVAL m.duration MINUTE)';
        $seances = $model->db->selectQuery($sql);
        
        
        return $this->render('index.php', Language::get('seance list'), [
            'seances' => $seances
        ]);
    }
    
    public function actionCreate()
    {
        if (isset($_POST['movie_seance']) && !empty($_POST['movie_seance'])) {
            $post = $_POST['movie_seance'];
            $model = new MovieSeanceModel($this->db);
            $model->movie_id = $post['movie'];
            $model->hall_id = $post['hall'];
            $model->seance_date = date('Y-m-d H:i:s',strtotime($post['seance_date']));
            $model->price = $post['price'];
            $model->language_type = $post['lang'];
            $model->status = 1;
            $model->create();
            
            header('Location: ' . Config::get('siteUrl') . 'movieSeance/view/' . $model->id);
            exit();
        }
        
        $model = new MovieModel($this->db);
        $sql = 'SELECT * FROM movie
                WHERE movie.status != 0';
        $movies = $model->db->selectQuery($sql);
    
        
        $model = new HallModel($this->db);
        $sql = 'SELECT * FROM hall
                WHERE hall.status != 0';
        $halls = $model->db->selectQuery($sql);
        
        return $this->render('create.php', Language::get('create seance'), [
            'movies' => $movies,
            'halls' => $halls
        ]);
    }
    
    public function actionView(int $id)
    {
        $model = new MovieSeanceModel($this->db);
        $sql = 'SELECT
                  ms.id,
                  ms.seance_date,
                  ms.price,
                  ms.language_type,
                  m.title_uz,
                  m.title_ru,
                  m.title_eng,
                  m.title_jap,
                  m.duration,
                  h.title,
                  m.img
                FROM movie_seance AS ms
                INNER JOIN movie AS m
                ON ms.movie_id = m.id
                INNER JOIN hall AS h
                ON h.id = ms.hall_id
                WHERE ms.seance_date > DATE_ADD(NOW(), INTERVAL m.duration MINUTE) AND ms.id = '.$id;
        $model = $model->db->selectQuery($sql);
    
    
        if (count($model) > 0) {
            $model = $model[0];
            return $this->render('view.php', Language::get('view seance'), [
                'seance' => $model,
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'movieSeance/');
        exit();
    }
}