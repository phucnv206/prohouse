<?php

use app\components\Helpers;
use app\models\Product;
use yii\helpers\Url;
$this->title = $model->details[0]->title;
?>
<div class="container">
    <div class="breadcrumb">
        <a href="/">Home</a> >
        <a href="<?=Url::to(['category/index', 'id' => $model->category->id, 'title' => Helpers::getSlug($model->category->details[0]->title)])?>">
            <?=$model->category->details[0]->title?>
        </a> >
        <?=$model->details[0]->title?>
    </div>
    <div class="col-md-8 col-left">
        <div class="col-md-6 pr-img">
            <img src="<?=$model->details[0]->thumbnail?>" />
        </div>
        <div class="col-md-6 pr-des">
            <a class="pro-name"><?=$model->details[0]->title?></a>
            <p class="pro-des"><?=$model->details[0]->summary?></p>
            <p class="pro-price">
                <?=Helpers::getPriceLabel($model['for'])?>:
                <span>
                    <?=Helpers::getPriceFormat($model)?>
                </span>
            </p>
            <a class="contc" href="<?=Url::to(['site/contact'])?>"><?=Yii::t('app', 'Contact us')?></a>
        </div>

        <div class="col-md-12" style="clear: both;">
            <br><br>
            <div class="responsive-content"><?=$model->details[0]->content?></div>
        </div>
    </div>
    <div class="col-md-4 col-right">
        <div class="title-right">
            <?=Yii::t('app', 'SIMILAR PROJECTS')?>
        </div>
        <div class="relate">
            <?php foreach ($others as $other): ?>
            <div class="moule-show">
                <div class="news-img">
                    <a href="<?=Url::to(['product/index', 'id' => $other['id'], 'title' => Helpers::getSlug($other->details[0]->title)])?>">
                        <img src="<?=$other->details[0]->thumbnail?>" />
                    </a>
                </div>
                <div class="des">
                    <div class="news-name">
                        <a><?=$other->details[0]->title?></a>
                    </div>
                    <div class="news-cate">
                        <a><?=Helpers::getFor($other['for'])?></a>
                    </div>
                    <div class="news-readmore">
                        <p><?=$other->details[0]->summary?></p>
                    </div>
                    <div class="news-proce pro-price">
                        <?=Helpers::getPriceLabel($other['for'])?>:
                        <span>
                            <?=Helpers::getPriceFormat($other)?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>

</div>