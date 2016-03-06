<?php

namespace App\Models;

use App\Classes\Model;
use App\IHasEmail;

class User extends Model implements IHasEmail
{

    const TABLE = 'users';

    public function getEmail()
    {
        return $this->email;
    }

}