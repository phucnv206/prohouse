<?php

use app\components\Helpers;
use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
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
                                    <?=Html::a($category->details[0]->title, ['category/index', 'id' => $category->id, 'title' => $category->details[0]->title])?>
                                    <?php if ($i + 1 < count($categories)): ?>
                                        <span style="color:#7c7c7c"> | </span>
                                    <?php endif?>
                                </li>
                            <?php else: ?>
                                <?php if ($i === 5): ?>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                <?=Yii::t('app', 'Other')?>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                            <?php endif?>
                                            <li><?=Html::a($category->details[0]->title, ['category/index', 'id' => $category->id, 'title' => $category->details[0]->title])?></li>
                                            <?php if (count($categories) === $i + 1): ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endif?>
                            <?php endif?>
                        <?php endforeach?>
                    </ul>
                </div>
                <div class="col-md-5 col-xs-12 head-right">
                    <ul>
                        <li><a title="" href="#">Hotline: <span style="color:#2196f5">0917 187 909</span></a></li>
                        <li><a title="" href="<?=Url::to(['site/about'])?>"><?=Yii::t('app', 'About')?> <span style="color:#7c7c7c">|</span></a></li>
                        <li class="last">
                            <?=Html::a(Yii::t('app', 'Contact'), ['site/contact'])?>
                        </li>
                        <li>
                            <a href="<?=Url::to(['site/location', 'lang' => 'en'])?>"><img src="/Content/new_images/us.png" height="16" /></a>
                            <a href="<?=Url::to(['site/location', 'lang' => 'vi'])?>"><img src="/Content/new_images/vn.png" height="16" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12 logo">
                    <a title="Prohouse" style="cursor:pointer" href="<?=Url::home()?>"><img alt="logo" src="/Content/new_images/logo.png" /></a>
                </div>
                <div class="col-md-7  main-menu pull-right" id='cssmenu'>
                    <ul>
                        <li>
                            <a title="<?=Yii::t('app', 'Apartment')?>" href="<?=Url::to(['site/search', 'type' => Product::TYPE_APARTMENT, 'title' => Yii::t('app', 'Apartment')])?>"><?=Yii::t('app', 'Apartment')?></a>
                        </li>
                        <li>
                            <a title="<?=Yii::t('app', 'House')?>" href="<?=Url::to(['site/search', 'type' => Product::TYPE_HOUSE, 'title' => Yii::t('app', 'House')])?>"><?=Yii::t('app', 'House')?></a>
                        </li>
                        <li>
                            <a title="<?=Yii::t('app', 'Office')?>" href="<?=Url::to(['site/search', 'type' => Product::TYPE_OFFICE, 'title' => Yii::t('app', 'Office')])?>"><?=Yii::t('app', 'Office')?></a>
                        </li>
                        <li>
                            <a title="<?=Yii::t('app', 'For lease')?>" href="<?=Url::to(['site/search', 'for' => Product::FOR_RENT, 'title' => Yii::t('app', 'For lease')])?>"><?=Yii::t('app', 'For lease')?></a>
                        </li>
                        <li>
                            <a title="<?=Yii::t('app', 'For sales')?>" href="<?=Url::to(['site/search', 'for' => Product::FOR_SALE, 'title' => Yii::t('app', 'For sales')])?>"><?=Yii::t('app', 'For sales')?></a>
                        </li>
                        <li style="position: relative" class="legal-btn">
                            <a title="<?=Yii::t('app', 'Legal')?>" href="#">
                                <?=Yii::t('app', 'Legal')?>
                            </a>
                            <div class="legal-dropdown">
                                <?php foreach (Helpers::listLegal() as $idx => $legal): ?>
                                <a href="<?=Url::to(['legal/index', 'id' => $legal->id, 'title' => $legal->details[0]->title])?>">
                                    <?=$legal->details[0]->title?>
                                </a>
                                <?php if ($idx === 0): ?>
                                    <a href="<?=Url::to(['legal/update'])?>">
                                        <?=Yii::t('app', 'Legal Update')?>
                                    </a>
                                <?php endif?>
                                <?php endforeach?>
                            </div>
                        </li>
                        <li style="display: none;"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .legal-btn:hover .legal-dropdown {
        visibility: visible;
    }
    .legal-dropdown {
        position: absolute;
        top: 50px;
        right: 0;
        z-index: 1;
        visibility: hidden;
    }
    .legal-dropdown a {
        background-color: #000;
        padding: 6px 10px !important;
        color: #FFF !important;
        display: block;
        min-width: 150px;
        height: 30px !important;
        font-size: 14px !important;

    }
    .legal-dropdown a:not(:last-child) {
        border-bottom: 1px solid #2b2525 !important;
    }
</style>