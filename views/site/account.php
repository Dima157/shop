<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<?php
    if(Yii::$app->session->hasFlash('error')){
        echo Yii::$app->session->getFlash('error');
    }
var_dump(Yii::$app->user->isGuest);
?>
<div class="form-account">
    <?php
    $form = ActiveForm::begin();
    echo $form -> field($account, 'login')->textInput(['class' => 'account_form form-control']);
    echo $form -> field($account, 'pass')->passwordInput(['class' => 'account_form form-control']);
    echo Html::submitButton('Login', ['class' => 'btn btn-success']);
    ActiveForm::end();
    ?>
</div>
