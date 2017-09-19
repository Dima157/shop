<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 11.09.2017
 * Time: 0:46
 */

namespace app\models;


use yii\db\ActiveRecord;

class Categories extends ActiveRecord{

    function getProduct(){
        return $this->hasMany(Product::className(), ['categories_id' => 'id']);
    }


} 