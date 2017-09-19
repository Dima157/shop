<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 12.09.2017
 * Time: 18:12
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Query;

class Account extends ActiveRecord{
    public $id_user;

    function attributeLabels(){
        return [
            'login' => 'Enter your login',
            'pass'  => 'Enter your pass'
        ];
    }

    function rules(){
        return [
            [['login', 'pass'], 'required'],
            ['login', 'string', 'min' => 4],
            ['pass', 'string', 'min' => 6]
        ];
    }

    function login(){
        $query = new Query();
        $res = $query->select(['*'])->from('account')->where(['login' => $this->login])->one();
        if($res){
            $this->id_user = $res['id'];
            if(\Yii::$app->getSecurity()->validatePassword($this->pass, $res['pass'])){
                return true;
            }
        }
        \Yii::$app->session->setFlash('error', 'Пароль или логин введены неверно');
        return false;


    }
} 