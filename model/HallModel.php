<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class HallModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'hall');
        $this->setAttributesName([
            'id',
            'title',
            'status'
        ]);
    }
}