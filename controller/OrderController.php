<?php

use vendor\Controller;
use config\Language;
use model\MovieSeanceModel;
use model\OrderSheetModel;
use model\OrderPlaceModel;
use config\Config;

class OrderController extends Controller
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
                os.id,
                ms.seance_date,
                ms.price,
                h.title AS hall_title,
                m.title_uz,
                m.title_ru,
                m.title_eng,
                m.title_jap,
                CONCAT(u.first_name,\' \',u.last_name) AS username,
                COUNT(op.id) AS order_place_count
            FROM order_sheet AS os
            INNER JOIN movie_seance AS ms ON ms.id = os.movie_seance_id
            INNER JOIN movie AS m ON ms.movie_id = m.id
            INNER JOIN hall AS h ON ms.hall_id = h.id
            INNER JOIN user AS u ON u.id = os.user_id
            LEFT JOIN order_place AS op ON op.order_sheet_id = os.id
            GROUP BY os.id, ms.seance_date, ms.price, h.title, m.title_uz, m.title_ru, m.title_eng, m.title_jap;';
        $orders = $model->db->selectQuery($sql);
        
        return $this->render('index.php', Language::get('seance list'), [
            'orders' => $orders
        ]);
    }
    
    public function actionView(int $id)
    {
        $model = new OrderSheetModel($this->db);
        $sql = 'SELECT
                os.id,
                ms.seance_date,
                ms.price,
                h.title AS hall_title,
                m.title_uz,
                m.duration,
                m.title_ru,
                m.title_eng,
                m.title_jap,
                m.description_uz,
                m.description_ru,
                m.description_eng,
                m.description_jap,
                m.img,
                CONCAT(u.first_name,\' \',u.last_name) AS username,
                ms.language_type
            FROM order_sheet AS os
            INNER JOIN movie_seance AS ms ON ms.id = os.movie_seance_id
            INNER JOIN movie AS m ON ms.movie_id = m.id
            INNER JOIN hall AS h ON ms.hall_id = h.id
            INNER JOIN user AS u ON u.id = os.user_id
            WHERE os.id = ' . $id;
        $model = $model->db->selectQuery($sql);
    
        if (count($model) > 0) {
            $model = $model[0];
            $place = new OrderPlaceModel($this->db);
            $sql = 'SELECT CONCAT(hp.row_title,hp.column_title) AS place FROM order_place AS op
                INNER JOIN hall_place AS hp
                ON hp.id = op.hall_place_id
                WHERE op.order_sheet_id = '.$id;
            return $this->render('view.php', Language::get('view seance'), [
                'sheet' => $model,
                'places' => $place->db->selectQuery($sql)
            ]);
        }
        header('Location: ' . Config::get('siteUrl') . 'movieSeance/');
        exit();
    }
}