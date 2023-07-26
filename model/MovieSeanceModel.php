<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class MovieSeanceModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'movie_seance');
        $this->setAttributesName([
            'id',
            'movie_id',
            'seance_date',
            'price',
            'language_type',
            'hall_id',
            'status'
        ]);
    }
}