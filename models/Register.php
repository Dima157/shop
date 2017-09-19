<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 12.09.2017
 * Time: 16:12
 */

namespace app\models;


use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class Register extends Model{

    public $login, $pass, $pass_again ,$name, $lastname, $email;

    function attributeLabels(){
        return [
            'login' => 'Введите логин',
            'pass' => 'Введите пароль',
            'pass_again' => 'Введите пароль',
            'name' => 'Введите имя',
            'lastname' => 'Введите фамилию',
            'email' => 'Введите емейл'
        ];
    }

    function rules(){
        return [
            [['login', 'pass', 'pass_again', 'name', 'lastname', 'email'], 'required'],
            ['pass', 'string', 'min' => 6],
            ['pass_again', 'string', 'min' => 6],
            ['pass_again', 'validPass'],
            ['name', 'string', 'min' => 4],
            ['lastname', 'string', 'min' => 4],
            ['email', 'email'],
            ['email', 'EmailExist'],
            ['login', 'LoginExist']

        ];
    }

    function validPass($attr){
        if($this->$attr != $this->pass){
            $this->addError($attr, 'Не верный повторный пароль');
        }
        //return false;
    }

    function passHash(){
        $this->pass = Yii::$app->getSecurity()->generatePasswordHash($this->pass);
    }

    function createUser(){
        //$account = new Account(['login' => $this->login, 'pass' => Yii::$app->getSecurity()->generatePasswordHash($this->pass)]);

        $account = new Account(['login' => $this->login, 'pass' => Yii::$app->getSecurity()->generatePasswordHash($this->pass)]);
        $account->save();
        $query = new Query();
        $id = $query->select(['id'])->from('account')->orderBy(['id' => SORT_DESC])->one();
        echo $id['id'];
        $user = new User(['name' => $this->name, 'lastname' => $this->lastname, 'email' => $this->email, 'account' => $id['id']]);
        $user->save();
    }

    function LoginExist($attr){
        $query = new Query();
        $res = $query->select(['login'])->from('account')->where(['login' => $this->$attr])->one();
        var_dump($res);
        if($res != false){
            $this->addError($attr, 'Такой логин существует');
        }
    }

    function EmailExist($attr){
        $query = new Query();
        $res = $query->select(['email'])->from('user')->where(['email' => $this->$attr])->one();
        if($res != false){
            $this->addError($attr, 'Такой емейл существует');
        }
    }

} 