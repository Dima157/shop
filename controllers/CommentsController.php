<?php
/**
 * Created by PhpStorm.
 * User: Dima157
 * Date: 15.09.2017
 * Time: 2:18
 */

namespace app\controllers;


use app\models\Account;
use app\models\Comments;
use yii\base\Controller;

class CommentsController extends Controller
{
    public $layout = false;

    function actionAdd(){
        $comment = new Comments();
        if(\Yii::$app->request->isAjax) {
            if($comment->load(\Yii::$app->request->post())){
                $comment->product_id = \Yii::$app->request->post('id');
                $comment->user_id = \Yii::$app->user->id;
                $comment->save();
                return $this->render('comment', ['comment' => $comment]);
            }
        }
    }

    function actionNew(){
        $c = new Comments();
        if($c->load(\Yii::$app->request->post())){
            var_dump($c->attributes);
        }
        return $this->render('new', ['c' => $c]);
    }
}
