<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$form = ActiveForm::begin();
echo $form->field($c, 'rating');
echo $form->field($c, 'text')->textarea();
echo Html::submitButton();
ActiveForm::end();