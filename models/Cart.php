<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 16.09.2017
 * Time: 2:12
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public $total_price;
    static function addToCart($product_id){
        $user_id = \Yii::$app->user->id;
        $cart = Cart::findOne(['user_id' => $user_id, 'product_id' => $product_id]);
        if($cart){
            $cart->col += 1;
        }else{
            $cart = new Cart(['user_id' => $user_id, 'product_id' => $product_id, 'col' => 1]);
        }

        $cart->save();
    }

    function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    function getPrice($price){
        return $this->col * $price;
    }

    static function getTotalPrice($cart){
        $sum = 0;
        foreach($cart as $one){
            $sum += $one->col * $one->product->price;
        }
        return $sum;
    }

    static function subFromCart($product_id){
        $user_id = \Yii::$app->user->id;
        $cart = Cart::findOne(['user_id' => $user_id, 'product_id' => $product_id]);
        $cart->col -= 1;
        $cart->save();
    }
}