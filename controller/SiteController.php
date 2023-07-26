<?php

use model\UserModel;
use vendor\Controller;
use config\Language;
use model\OrderSheetModel;

class SiteController extends Controller
{
    public function convertToHourMinute($minutes)
    {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        if ($minutes != 0) {
            return sprintf('%2dh %02dm', $hours, $minutes);
        }
        return sprintf('%2dh', $hours);
    }
    
    public function beforeAction()
    {
        $this->layout = 'user-layout.php';
    }
    
    public function actionIndex()
    {
        $slider = $this->db->selectQuery('SELECT m.*,
                    IFNULL(MIN(ms.language_type),0) AS language_type,
                   IFNULL(MIN(ms.seance_date), 0) AS closest_seance_date,
                   IFNULL(MIN(ms.id), 0) AS seance_id
            FROM movie AS m
            LEFT JOIN movie_seance AS ms
            ON m.id = ms.movie_id
            WHERE ms.seance_date >= NOW() OR ms.seance_date IS NULL
            GROUP BY m.id');
        return $this->render('index.php', 'Cinema', [
            'slider' => $slider
        ]);
    }
    
    public function actionAdd(int $seance_id)
    {
        $movie = $this->db->selectQuery('SELECT * FROM movie_seance AS ms
            INNER JOIN movie AS m
            ON ms.movie_id = m.id
            WHERE ms.`status` AND ms.id =' . $seance_id);
        
        $places = $this->db->selectQuery('SELECT hp.* FROM movie_seance AS ms
                RIGHT  JOIN hall_place AS hp ON hp.hall_id = ms.hall_id
                INNER JOIN order_sheet AS os ON os.movie_seance_id = ms.id
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM order_place AS op
                    WHERE op.hall_place_id = hp.id AND os.id = op.order_sheet_id
                ) AND  ms.id = '.$seance_id);
//        dd($places);
        return $this->render('add.php', 'Cinema', [
            'model' => $movie[0],
            'places' => $places
        ]);
    }
}