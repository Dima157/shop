<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\rating\StarRating;


    $this->registerJsFile('js/jquery.bxslider.js', ['depends' => 'yii\web\YiiAsset']);
?>
<ul class="bxslider">
    <?for($i = 0; $i < count($img); $i++):?>
        <li><?=Html::img($img[$i]['path'])?></li>
    <?endfor;?>
</ul>

<div class="info_block">
    <div class="top_info"style="position: relative">
        <div class="left_info info color_block_active block">Описание</div>
        <div  class="right_info info color_block block">Отзывы</div>
    </div>
    <div class="inner_block_left inner_block" data-id="<?=$product->id?>">
       <?php
       $n = 0;
       foreach($product->productAttr as $attr): ?>
           <?if($n == 1):?>
               <div class="black_categories info_product">
                   <span class="name"><?=$attr->getAttr();?></span>
                   <span class="value"><?=$attr->value;?></span>
               </div>
               <?$n = 0;?>
           <?else:?>
               <div class="gray_categories info_product">
                   <span class="name"><?=$attr->getAttr();?></span>
                   <span class="value"><?=$attr->value;?></span>
               </div>
           <?endif;?>
           <?$n = 1;?>
        <?endforeach;?>
    </div>
    <div class="inner_block_right inner_block">
        <div class="all_comment">
            <?foreach($product->comments as $comment):?>
                <?$user = \app\models\User::findOne($comment->user_id)?>
                <div>
                    <span><?=$user->name?></span> <span><?=$user->lastname?></span> <br/>
                    <span></span> <br>
                    <span><?=$comment->text?></span>
                </div>
            <?endforeach;?>
        </div>
        <?php
            $form = ActiveForm::begin(['options' => ['class' => 'form']]);
            echo $form->field($comments, 'rating')->widget(StarRating::classname(), [
                'pluginOptions' => [
                    'size'=>'xs',
                    'showClear' => false,
                    'showCaption' => false,
                    ''
                ]
            ])->label('Ваша оценка');
            echo $form->field($comments, 'text')->textarea(['class' => 'text_comment form-control']);
            echo Html::submitButton('Отправть');
            ActiveForm::end();


        ?>
    </div>
</div>

<?php


?>