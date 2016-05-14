<?php

use app\components\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;
if ($type !== null && $for === null) {
    $title = Helpers::getType($type);
} elseif ($for !== null && $type === null) {
    $title = Helpers::getFor($for);
} else {
    $title = Yii::t('app', 'Result');
}
$this->title = $title;
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
                    <a title="<?=$product['details'][0]['title']?>" href="<?=Url::to(['product/index', 'id' => $product['id'], 'title' => Helpers::getSlug($product['details'][0]['title'])])?>">
                        <img alt="<?=$product['details'][0]['title']?>" src="<?=$product['details'][0]['thumbnail']?>" />
                    </a>
                </div>
                <div class="des">
                    <div class="news-name">
                        <a href="<?=Url::to(['product/index', 'id' => $product['id'], 'title' => Helpers::getSlug($product['details'][0]['title'])])?>"><?=$product['details'][0]['title']?></a>
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
        <?=$this->render('_rightbox', [
            'ads' => $ads,
            'posts' => $posts,
            'type' => $type,
            'for' => $for,
            'location' => $location
        ])?>
    </div>

</div>