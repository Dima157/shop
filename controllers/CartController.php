<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 10.09.2017
 * Time: 17:54
 */

namespace app\controllers;


use app\models\Cart;
use app\models\Product;
use yii\web\Controller;
use yii\filters\AccessControl;

class CartController extends Controller{

    function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    function actionIndex(){
        $cart = Cart::find()->where(['user_id' => \Yii::$app->user->id])->all();
        return $this->render('all', ['cart' => $cart]);
    }

    function actionAdd(){
        if(\Yii::$app->request->isAjax){
            $product_id = \Yii::$app->request->post('product_id');
            Cart::addToCart($product_id);
            $cart = Cart::findOne($product_id);
            $product = Product::findOne($product_id);
            return $product->price;
            //return $product->price;
        }

    }

    function actionSub(){
        if(\Yii::$app->request->isAjax){
            $product_id = \Yii::$app->request->post('product_id');
            $product = Product::findOne($product_id);
            Cart::subFromCart($product_id);
            return $product->price;
        }
    }

    function actionDelete(){
        if(\Yii::$app->request->isAjax){
            $id = \Yii::$app->request->post('id');
            $cart = Cart::findOne($id);
            $cart->delete();
        }
    }

} 