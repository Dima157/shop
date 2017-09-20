<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div>
    <form class="filter_form">
        <select name="filter" id="filter_categories">
            <option value="normal"  <?if($_GET['filter'] == 'normal'):?>selected="selected"<?endif;?>>В разброс</option>
            <option value="min" <?if($_GET['filter'] == 'min'):?>selected="selected"<?endif;?>>От минимального</option>
            <option value="max" <?if($_GET['filter'] == 'max'):?>selected="selected"<?endif;?>>От максимального</option>
        </select>
    </form>
</div>
<?foreach ($products as $product):?>
    <div class="product_item" data-id="<?=$product->id?>">
        <img src="<?=$product->getImg()[0]['path']?>" alt="123">
        <div class="product_name">
            <a href="<?=Url::to(['/product/show', 'id' => $product->id])?>" class="name"><?=$product->name?></a>
        </div>
        <div>
            <div>
                <i class="fa fa-shopping-cart add-cart" aria-hidden="true"></i>
            </div>
            <div class="price_item">
                <span>Цена: <?=$product->price?></span>
            </div>
        </div>
    </div>
<?endforeach;?>
<?
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>