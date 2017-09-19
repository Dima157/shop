<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 11.09.2017
 * Time: 19:19
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Query;

class Product extends ActiveRecord{

    function getCategories(){
        return $this->hasOne(Categories::className(), ['id' => 'categories_id']);
    }

    function getProductImg(){
        return $this->hasMany(ImgList::className(), ['product_id' => 'id']);
    }

    function getImg(){
        $query = new Query();
        $res = $query->select(['path'])->from('productImg')->where(['product_id' => $this->id])->all();
        return $res;
    }

    function getProductAttr(){
        return $this->hasMany(ProductAttr::className(), ['product_id' => 'id']);
    }

    function getComments(){
        return $this->hasMany(Comments::className(), ['product_id' => 'id']);
    }

    static function search($name){
        return static::find()->where(['like', 'name', $name])->all();
    }

}