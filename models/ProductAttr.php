<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 14.09.2017
 * Time: 16:42
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Query;

class ProductAttr extends ActiveRecord
{
    public $query;

    function init(){
        $this->query = new Query();
    }

    static function tableName(){
        return 'ProductAttr';
    }

    function getAttr(){
        $res = $this->query->select('name')->from('attr')->where(['id' => $this->attr_id])->one();
        return $res['name'];
    }

    function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}