<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?if($products):?>
    <?foreach ($products as $product):?>
        <div class="product_item" data-id="<?=$product->id?>">
            <a href="<?=Url::to(['/product/show', 'id' => $product->id])?>"><?=$product->name?></a>
            <img src="<?=$product->getImg()[0]['path']?>" alt="123">
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
<?else:?>
    <h1>no</h1>
<?endif;?>
