<?php

namespace model;

use vendor\DB;
use vendor\abstract\AbstractModel;

class MovieSeanceModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'movie_seance');
    }
    
}