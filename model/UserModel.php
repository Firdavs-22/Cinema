<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class UserModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'user');
        $this->setAttributesName([
            'id',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'password_pure',
            'password_hash',
            'created_date',
            'language_type',
            'theme_type',
            'status'
        ]);
    }
}