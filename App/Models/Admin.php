<?php

namespace App\Models;


use App\Classes\DB;
use App\Classes\Model;

class Admin extends Model {

    const TABLE = 'admins';

    public static function validate($email, $pass) {

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE email=:email';
        $db = DB::instance();
        $db->setClass(static::class);
        $admin = $db->query($sql, [':email'=>$email]);
        if([] == $admin) {
            return false;
        } else {
           if($pass == $admin[0]->pass){
               $_SESSION['admin'] = $email;
               return true;
           };
        }

    }

}