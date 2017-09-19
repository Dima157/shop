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

    function actionSearch(){
        $name = \Yii::$app->request->get('search');
        $products = Product::search($name);
        $pages = new Pagination(['totalCount' => count($products), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $products = Product::find()->where(['like', 'name', $name])->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('search', ['products' => $products, 'pages' => $pages]);
    }
} 