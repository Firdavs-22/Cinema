<?php

namespace model;

use vendor\DB;
use vendor\abstract\AbstractModel;


class AdminModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'admin');
    }
    
}