<?php
use yii\bootstrap\Modal;
?>
    <div class="head">
        <div>Изображение</div>
        <div>Наименование</div>
        <div>Кооличество</div>
        <div>Сумма</div>
    </div>
<?foreach ($cart as  $one):?>
    <div data-id="<?=$one->product->id?>" class="all_item">
        <div class="img_cart">
            <img src="<?= $one->product->getImg()[0]['path'] ?>" alt="no">
        </div>
        <div><?=$one->product->name;?></div>
        <div class="col_cart">
            <span class="fa fa-minus minus-from-cart"></span>
            <span class="col"><?=$one->col?></span>
            <span class="fa fa-plus add-to-cart"></span>
        </div>
        <div id="price"><?=$one->getPrice($one->product->price)?></div>
    </div>
<?endforeach;?>
    <div class="total_sum">
        <div>Итоговая сумма</div>
        <div><span class="total-price"><?=\app\models\Cart::getTotalPrice($cart)?></span></div>
    </div>
<?php
Modal::begin([
    'header' => '<h1>Оформить заказ</h1>',
    'toggleButton' => [
        'label' => 'Оформить заказ',
        'class' => 'order_show btn'
    ]
]);
?>

    <div class="show_order_item">
        <div>ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</div>
        <div>fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</div>
    </div>

<?
Modal::end();
?>