<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 12.09.2017
 * Time: 16:44
 */

namespace app\controllers;


use app\models\Account;
use app\models\Register;
use yii\web\Controller;
use app\models\User;


class RegisterController extends Controller{

    function actionIndex(){
        $register = new Register();
        if($register->load(\Yii::$app->request->post()) && $register->validate()){
            $register->createUser();
            $this->redirect('/');
        }
        return $this->render('reg_form', ['register' => $register]);
    }
} 