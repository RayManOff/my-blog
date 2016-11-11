<?php

namespace App\Models;

use App\Classes\Model;
use App\Classes\TCollection;


class Image
    extends Model implements \ArrayAccess
{
    use TCollection;
    
    const TABLE = 'image';

}