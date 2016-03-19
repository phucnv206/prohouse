<?php

use yii\helpers\Html;
use app\components\Helpers;
use yii\helpers\Url;
use app\models\Product;
?>

<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12 head-left">
                    <ul>
                        <?php foreach ($categories = Helpers::listCategories() as $i => $category): ?>
                            <?php if ($i <= 4): ?>
                            <li>
                                <?= Html::a($category->details[0]->title, ['category/index', 'id' => $category->id]) ?>
                                <?php if ($i + 1 < count($categories)): ?>
                                    <span style="color:#7c7c7c"> | </span>
                                <?php endif ?>
                            </li>
                            <?php else: ?>
                                <?php if ($i === 5): ?>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                <?= Yii::t('app', 'Other') ?>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                <?php endif ?>
                                                <li><?= Html::a($category->details[0]->title, ['category/index', 'id' => $category->id]) ?></li>
                                <?php if (count($categories) === $i + 1): ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-md-5 col-xs-12 head-right">
                    <ul>
                        <li><a title="" href="#">Hotline: <span style="color:#2196f5">0917 187 909</span></a></li>
                        <li><a title="" href="#"><?= Yii::t('app', 'About') ?> <span style="color:#7c7c7c">|</span></a></li>
                        <li class="last">
                            <?= Html::a(Yii::t('app', 'Contact'), ['site/contact']) ?>
                        </li>
                        <li>
                            <a href="<?= Url::to(['site/location', 'lang' => 'en']) ?>"><img src="/Content/new_images/us.png" /></a>
                            <a href="<?= Url::to(['site/location', 'lang' => 'vi']) ?>"><img src="/Content/new_images/vn.png" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 logo">
                    <a title="Prohouse" style="cursor:pointer" href="<?= Url::home() ?>"><img alt="logo" src="/Content/new_images/logo.png" /></a>
                </div>
                <div class="col-md-offset-2 col-md-7  main-menu pull-right" id='cssmenu'>
                    <ul>
                        <li>
                            <a title="FOR RENT" href="<?= Url::to(['site/search', 'for' => Product::FOR_RENT]) ?>"><?= Yii::t('app', 'For rent') ?></a>
                        </li>
                        <li>
                            <a title="KFOR SALE" href="<?= Url::to(['site/search', 'for' => Product::FOR_SALE]) ?>"><?= Yii::t('app', 'For sale') ?></a>
                        </li>
                        <li>
                            <a title="APARTMENT" href="<?= Url::to(['site/search', 'type' => Product::TYPE_APARTMENT]) ?>"><?= Yii::t('app', 'Apartment') ?></a>
                        </li>
                        <li>
                            <a title="OFFICE" href="<?= Url::to(['site/search', 'type' => Product::TYPE_OFFICE]) ?>"><?= Yii::t('app', 'Office') ?></a>
                        </li>
                        <li>
                            <a title="HOUSE" href="<?= Url::to(['site/search', 'type' => Product::TYPE_HOUSE]) ?>"><?= Yii::t('app', 'House') ?></a>
                        </li>
                        <li style="display: none;"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>