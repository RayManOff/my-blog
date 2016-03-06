<?php

namespace App\Models;

use App\Classes\DB;
use App\Classes\Model;

/**
 * @property string $title
 * @property string $text
 * @property string $author
 * @property integer $author_id
 */
class News extends Model
    implements \ArrayAccess
{

    const TABLE = 'News';

    public function validateTitle($v){

        if(empty($v)){
            throw new \Exception('Пустой заголовок');
        }
        if(strlen($v) > 20){
            throw new \Exception('Слишком длинный заголовок');
        }
        return true;
    }

    public function validateText($v){

        if(empty($v)){
            throw new \Exception('А где же текст');
        }
        return true;
    }

    public function setAuthor($v)
    {
        if (!empty($v)) {
            $author = Author::findOneByColumn('author_name', $v);
            if (false !== $author) {
                $this->data['author_id'] = $author->id;
            } else {
                $author = new Author();
                $author->author_name = $v;
                $author->save();
                $this->data['author_id'] = $author->id;
            }
        } else {
            throw new \Exception('Забыли указать автора');
        }
    }

    public function getAuthor()
    {
        if (!empty($this->data['author_id'])) {
            return Author::findOneById($this->data['author_id']);
        } else {
            return false;
        }
    }

    public function __isset($k)
    {
        if ('author' == $k) {
            return !empty($this->data['author_id']);
        } else {
            return !empty($this->data[$k]);
        }
    }

    public static function findLastNews(int $n)
    {
        $sql = 'SELECT * FROM ' . static::TABLE . sprintf(' ORDER BY id DESC LIMIT %d', $n);
        $db = DB::instance();
        $db->setClass(static::class);
        $res = $db->query($sql);
        return ([] == $res) ? false : $res;
    }


}