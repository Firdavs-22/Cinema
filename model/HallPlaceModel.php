<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class HallPlaceModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'hall_place');
        $this->setAttributesName([
            'id',
            'hall_id',
            'row_title',
            'column_title',
            'row_position',
            'column_position',
            'status'
        ]);
    }
}