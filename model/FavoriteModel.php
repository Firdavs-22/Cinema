<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class FavoriteModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'favorite');
        $this->setAttributesName([
            'id',
            'user_id',
            'movie_id',
            'status'
        ]);
    }
}