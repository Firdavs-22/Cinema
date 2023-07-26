<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class OrderSheetModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'order_sheet');
        $this->setAttributesName([
            'id',
            'movie_seance_id',
            'bought_date',
            'status'
        ]);
    }
}