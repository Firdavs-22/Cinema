<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class OrderPlaceModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'order_place');
        $this->setAttributesName([
            'id',
            'order_sheet_id',
            'hall_place_id',
            'status'
        ]);
    }
}