<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Helpers;
?>
<div class="box-option">
    <?=Html::beginForm(Url::to(['site/search']), 'get')?>
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
    <h5><?=Yii::t('app', 'NEWS')?></h5>
    <div class="show-news">
        <?php foreach ($posts as $post): ?>
        <div class="show-news-item col-md-6">
            <div class="img-news">
                <a href="<?=Url::to(['post/index', 'id' => $post->id, 'title' => $post['details'][0]['title']])?>"><img src="<?=$post->details[0]->thumbnail?>" /></a>
            </div>
            <div class="name-news">
                <p><a style="color: black; font-size: 14px;" href="<?=Url::to(['post/index', 'id' => $post->id, 'title' => $post['details'][0]['title']])?>"><?=$post->details[0]->title?></a></p>
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>
