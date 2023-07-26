<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class CategoryModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'category');
        $this->setAttributesName([
            'id',
            'title_uz',
            'title_ru',
            'title_eng',
            'title_jap',
            'status'
        ]);
    }
}