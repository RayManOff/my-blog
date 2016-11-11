<?php


namespace App\Controllers;

use App\Classes\Controller;

class Product extends Controller
{
    public function actionIndex()
    {
//        $products = \App\Models\Product::findAll();
//
//        var_dump($products);
    }

    public function actionCreate()
    {
        for ($n = 0; $n <= 1000; ++$n) {
            $randArticle = rand(99999, 999999);
            $randPrice = rand(9999, 99999);
            $randOldPrice = rand(9999, 99999);
            $randCount = rand(1, 999);
            $randCategory = rand(1, 3);
            $randBrand = rand(1, 5);
            $randDate = date('Y-m-d', mt_rand(strtotime('12-06-2006'), strtotime('1-09-2016')));

            $product = new \App\Models\Product();
            $product->fill([
                'name'         => 'Product_'. $randArticle ,
                'article'      => $randArticle,
                'price'        => $randPrice,
                'old_price'    => $randOldPrice,
                'image'        => '/' . $randArticle . '.jpg',
                'date'         => $randDate,
                'count'        => $randCount,
                'category_id'  => $randCategory,
                'brand_id'     => $randBrand
            ]);

            $product->save();
        }
    }

}