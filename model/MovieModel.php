<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class MovieModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'movie');
        $this->setAttributesName([
            'id',
            'title_uz',
            'title_ru',
            'title_eng',
            'title_jap',
            'description_uz',
            'description_ru',
            'description_eng',
            'description_jap',
            'created_date',
            'duration',
            'img',
            'status'
        ]);
    }
}