<?php

namespace model;

use vendor\ActiveRecord;
use vendor\DataBase;

class AdminModel extends ActiveRecord
{
    public function __construct(DataBase $db)
    {
        parent::__construct($db, 'admin');
        $this->setAttributesName([
            'id',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'password_pure',
            'password_hash',
            'role',
            'language_type',
            'status',
        ]);
    }
}