<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Categories;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?=Url::current();?>
<div id="wrapper">
    <div id="header">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=Url::to(['/'])?>">WebSiteName</a>
                </div>
                <form class="navbar-form navbar-left" action="/product/search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=Url::to(['/register'])?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="<?=Url::to(['/site/login'])?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="<?= Url::to('/cart') ?>"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
                </ul>

            </div>
        </nav>


    </div>

    <?php
    $url = ['/site/login', '/register/index', '/cart/index'];
    if(!in_array(Url::current(), $url)):?>
        <div class="col-md-4 left_basic basic">
            <div class="catalog_products">Каталог товаров</div>

            <?$categories = Categories::find()->all();
            foreach($categories as $category):
            ?>
                <div class="category black_categories">
                    <div>
                        <div><a href="<?=Url::to(['/categories/all', 'id' => $category->id])?>"><?=$category->name?></a></div>
                        <div class="arrow"><span class="fa fa-arrow-circle-right" aria-hidden="true"></span></div>
                    </div>
                </div>
                <div class="product">
                    <?foreach($category->product as $product):?>
                        <div>
                            <a href="<?=Url::to(['/product/show', 'id' => $product->id])?>"><?=$product->name;?></a>
                        </div>
                    <?endforeach;?>
                </div>

            <?endforeach;?>

        </div>
        <div class="col-md-8 right_basic basic">
            <?=$content;?>
        </div>
    <?else:?>
        <?=$content;?>
    <?endif;?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
