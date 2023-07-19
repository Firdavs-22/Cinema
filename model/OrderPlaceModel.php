<?php

namespace model;

use vendor\DB;
use vendor\abstract\AbstractModel;


class OrderPlaceModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'order_place');
    }
    
}