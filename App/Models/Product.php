<?php

namespace App\Models;

use App\Classes\Model;

class Product extends Model
    implements \ArrayAccess
{
    const TABLE = 'products';

}