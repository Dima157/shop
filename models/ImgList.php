<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 12.09.2017
 * Time: 13:31
 */

namespace app\models;


use yii\db\ActiveRecord;

class ImgList extends ActiveRecord{

    static function tableName(){
        return 'productImg';
    }
} 