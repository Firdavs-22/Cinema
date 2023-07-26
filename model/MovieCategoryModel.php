<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class MovieCategoryModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'movie_category');
        $this->setAttributesName([
            'id',
            'category_id',
            'movie_id',
            'status'
        ]);
    }
}