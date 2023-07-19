<?php

namespace model;

require 'vendor/abstract/AbstractModel.php';

use vendor\DB;


class HallPlaceModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'hall_place');
    }
    
}