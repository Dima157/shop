<?php
use kartik\rating\StarRating;
//var_dump(\Yii::$app->request->post());
$user = \app\models\User::findOne(Yii::$app->user->id);
echo $user->name  . ' ' . $user->lastname . '<br>';
echo StarRating::widget([
    'name' => 'rating_1',
    'pluginOptions' => [
        'disabled'=>true,
        'showClear'=>false,
        'value' => $comment->rating
    ]
]);
echo '<br>';
echo $comment->text;