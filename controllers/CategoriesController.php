<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 16.09.2017
 * Time: 0:49
 */

namespace app\controllers;


use app\models\Product;
use yii\web\Controller;
use yii\data\Pagination;
use yii\db\Query;

class CategoriesController extends Controller
{

    function actionAll($id){
        $query = new Query();
        $products = Product::find()->where(['categories_id' => $id])->all();
        $pages = new Pagination(['totalCount' => count($products), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $products = Product::find()->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('all', ['products' => $products, 'pages' => $pages]);
    }
}