<?php

namespace App\Models;

use App\Classes\Model;
use App\Classes\TCollection;


/**
 * Class Author
 * @property integer $id
 * @property string $author_name
 */

class Author extends Model
            implements \ArrayAccess {

    use TCollection;

    const TABLE = 'authors';

}