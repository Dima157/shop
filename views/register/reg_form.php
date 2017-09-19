<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($register, 'login');
echo $form->field($register, 'pass');
echo $form->field($register, 'pass_again');
echo $form->field($register, 'name');
echo $form->field($register, 'lastname');
echo $form->field($register, 'email');
echo Html::submitButton('Register', ['class' => 'btn btn-success']);
ActiveForm::end();