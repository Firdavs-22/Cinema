<?php

namespace model;

require 'vendor/abstract/AbstractModel.php';

use vendor\DB;


class OrderSheetModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'order_sheet');
    }
    
}