<?php

namespace App\Models;

use App\Classes\Model;
use App\TArrayAccess;

/**
 * Class Author
 * @property integer $id
 * @property string $author_name
 */

class Author extends Model
            implements \ArrayAccess {

    use TArrayAccess;

    const TABLE = 'authors';

}