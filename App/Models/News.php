<?php

namespace App\Models;
use App\Classes\DB;
use App\Classes\Model;
use App\TArrayAccess;


/**
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $author_id
 */

class News extends Model
            implements \ArrayAccess {

    use TArrayAccess;

    const TABLE = 'News';

    public function __set($k, $v) {

        if('author' == $k){

            $author = Author::findOneByColumn('author_name', $v);
            if(false !== $author) {
                $this->data['author_id'] = $author->id;
            } else {
                $author = new Author();
                $author->author_name = $v;
                $author->save();
                $this->data['author_id'] = $author->id;
            }

        } else {

            $this->data[$k] = $v;
        }
    }

    public function __get($k) {

        if('author' == $k) {
            if(!empty($this->data['author_id'])){
                return Author::findOneById($this->data['author_id']);
            } else {
                return false;
            }
        } else {
            return $this->data[$k];
        }
    }

    public function __isset($k){

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

    public function fill(array $data)
    {
        $this->title = $data['title'];
        $this->text = $data['text'];
        $this->author = $data['author'];
    }

    public function checkData(array $data){

        return ((!empty($data['title'])) &&
               (!empty($data['text'])) &&
               (!empty($data['author'])));

    }


}