<?php

use app\components\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">
    <div class="col-md-8 col-left">
        <div class="row">
            <?php if (empty($products)): ?>
            <?=Yii::t('app', 'No results found')?>
            <?php endif?>
            <?php foreach ($products as $i => $product): ?>
            <div class="col-md-6 moule-show" style="padding: 0 10px; height: 360px;">
                <div class="news-img">
                    <a title="<?=$product['details'][0]['title']?>" href="<?=Url::to(['product/index', 'id' => $product['id']])?>">
                        <img alt="<?=$product['details'][0]['title']?>" src="<?=$product['details'][0]['thumbnail']?>" />
                    </a>
                </div>
                <div class="des">
                    <div class="news-name">
                        <a href="<?=Url::to(['product/index', 'id' => $product['id']])?>"><?=$product['details'][0]['title']?></a>
                    </div>
                    <div class="news-cate">
                        <a><?=Helpers::getFor($product['for'])?></a>
                    </div>
                    <div class="news-readmore">
                        <p><?=$product['details'][0]['summary']?></p>
                    </div>
                    <div class="news-proce">
                        <?=Helpers::getPriceLabel($product['for'])?>:
                        <span style="color:#dd5626">
                            <?=Helpers::getPriceFormat($product)?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
    <div class="col-md-4 col-right">
        <div class="box-option">
            <?=Html::beginForm(['site/search'], 'get')?>
            <?=Html::dropDownList('type', $type, Helpers::getType(), ['class' => 'col6'])?>
            <?=Html::dropDownList('for', $for, Helpers::getFor(), ['class' => 'col6'])?>
            <?=Html::dropDownList('location', $location, Helpers::getLocations(), ['class' => 'col7'])?>
            <?=Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary col5'])?>
            <?=Html::endForm()?>
        </div>
        <div class="qc">
            <?php foreach ($ads as $ad): ?>
                <?php if (empty($ad->url)): ?>
                    <img src="<?=$ad->image?>" />
                <?php else: ?>
                    <a href="<?=$ad->url?>"><img src="<?=$ad->image?>" /></a>
                <?php endif?>
            <?php endforeach?>
        </div>
        <div class="news-feature">
            <h2><?=Yii::t('app', 'NEWS')?></h2>
            <div class="show-news">
                <?php foreach ($posts as $post): ?>
                    <div class="show-news-item col-md-6">
                        <div class="img-news">
                            <a href="<?=Url::to(['post/index', 'id' => $post->id])?>"><img src="<?=$post->details[0]->thumbnail?>" /></a>
                        </div>
                        <div class="name-news">
                            <p><a style="color: black; font-size: 14px;" href="<?=Url::to(['post/index', 'id' => $post->id])?>"><?=$post->details[0]->title?></a></p>
                        </div>
                    </div>
                <?php endforeach?>

            </div>
        </div>
    </div>

</div>