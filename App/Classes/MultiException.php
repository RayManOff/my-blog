<?php

namespace App\Classes;

class MultiException
    extends \Exception implements \ArrayAccess, \Iterator
{
    use TCollection;

}