<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 14.09.2017
 * Time: 15:48
 */

namespace app\models;


use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{

    function attributeLabels(){
        return [
            'rating' => '',
            'text' => 'Введите текст коментария'
        ];
    }

    function rules(){
        return [
            [['text', 'rating'], 'required']
        ];
    }

    function addComment(){
        $this->save();
    }
}