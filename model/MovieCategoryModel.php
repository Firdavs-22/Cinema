<?php

namespace model;

use vendor\DB;
use vendor\abstract\AbstractModel;

class MovieCategoryModel extends AbstractModel
{
    public function __construct(DB $db)
    {
        parent::__construct($db, 'movie_category');
    }
    
}