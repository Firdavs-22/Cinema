<?php

use model\UserModel;
use vendor\Controller;
use config\Language;
use model\OrderSheetModel;
class UserController extends Controller
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
        $user = new UserModel($this->db);
        
        return $this->render('index.php', Language::get('user list'), [
            'users' => $user->getAll()
        ]);
    }
    
    public function actionView(int $id)
    {
        $model = new UserModel($this->db);
        $model->findOne($id);
        
        if ($model->id != null) {
            $orders = new OrderSheetModel($this->db);
            $sql = 'SELECT
                  os.id,
                  os.bought_date,
                  m.title_uz,
                  m.title_ru,
                  m.title_eng,
                  m.title_jap
                FROM order_sheet AS os
                INNER JOIN movie_seance AS ms ON ms.id = os.movie_seance_id
                INNER JOIN movie AS m ON m.id = ms.movie_id
                WHERE os.user_id = '.$id;
            return $this->render('view.php', Language::get('user view'), [
                'user' => $model,
                'orders' => $orders->db->selectQuery($sql)
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'user/');
        exit();
    }
    
}