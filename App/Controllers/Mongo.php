<?php

namespace App\Controllers;

use App\Classes\Controller;
use MongoDB\Client;

class Mongo extends Controller
{
    protected function actionIndex()
    {
        $connect = new Client();

        $collect = $connect->example->users;

        /**
         * Insert example
         */
        /*
        $insertOneResult = $collect->insertMany([
            [
                '_id'       => 4,
                'username'  => 'gadel',
                'email'     => 'admin@example.com',
                'name'      => 'Admin User',
                ],
            [
               '_id'        => 5,
                'username'  => 'test',
                'email'     => 'test@test',
                'name'      => 'test name'
            ]
        ]);

        printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

        var_dump($insertOneResult->getInsertedIds());*/

        $collect = $connect->example->users;

        $docs = $collect->find([]);

        foreach ($docs as $document) {
            echo $document['_id'], "\n";
        }

//        var_dump($document);die;
    }
}