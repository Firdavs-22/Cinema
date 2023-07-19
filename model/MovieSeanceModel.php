<?php

namespace model;

require 'vendor/abstract/AbstractModel.php';

use vendor\DB;


class MovieSeanceModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'movie_seance');
    }
    
}