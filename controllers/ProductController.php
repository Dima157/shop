<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 11.09.2017
 * Time: 21:08
 */

namespace app\controllers;


use app\models\Comments;
use app\models\Product;
use yii\web\Controller;
use yii\data\Pagination;

class ProductController extends Controller{

    function actionShow($id){
        $product = Product::findOne($id);
        $img = $product->getImg();
        $comments = new Comments();
        return $this->render('item', ['product' => $product, 'img' => $img, 'comments' => $comments]);
    }

    function actionSearch($search, $filter = null){
        $products = Product::search($search);
        $pages = new Pagination(['totalCount' => count($products), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        switch($filter){
            case null:
            case 'normal':
                $products = Product::find()->where(['like', 'name', $search])->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                break;
            case 'min':
                $products = Product::find()->where(['like', 'name', $search])->orderBy(['price' => SORT_ASC])->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                break;
            case 'max':
                $products = Product::find()->where(['like', 'name', $search])->orderBy(['price' => SORT_DESC])->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                break;
        }
        return $this->render('search', ['products' => $products, 'pages' => $pages]);
    }
} 