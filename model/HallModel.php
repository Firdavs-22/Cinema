<?php

namespace model;

use vendor\DB;
use vendor\abstract\AbstractModel;

class HallModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'hall');
    }
    
}