<?php

namespace app\controllers;

use app\models\Account;
use app\models\Categories;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

    function actionIndex(){
        $categories = Categories::find()->all();
        return $this->render('index', ['categories' => $categories]);
    }

    function actionLogin(){
        if(Yii::$app->user->isGuest) {
            $account = new Account();
            if ($account->load(Yii::$app->request->post())) {
                if ($account->login()) {
                    $user = User::findOne(['account' => $account->id_user]);
                    Yii::$app->user->login($user, 3600 * 24 * 2);
                    $this->redirect(['/']);
                }
            }
            return $this->render('account', ['account' => $account]);
        }else{
            $this->redirect(['/']);
        }
    }

    function actionTest(){
        $user = new User(['name' => 'dima']);
        $a = $user->attributes;
        var_dump($a);
    }
}
