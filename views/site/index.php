<?php

use app\components\Helpers;
use app\models\Product;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?= $this->render('/layouts/_slider') ?>

<div class="container">
    <div class="col-md-8 col-left">
        <?php foreach ($list as $type => $item): ?>
        <div class="module">
            <?php
                $class = '';
                if ($type == Product::TYPE_OFFICE)
                    $class = 'office';
                elseif ($type == Product::TYPE_HOUSE)
                    $class = 'house';
            ?>
            <div class="module-name <?= $class ?>">
                <a><?= Helpers::getType($type) ?></a>
                <div class="dieu_huong">
                    <a data-slide="prev" href="#myCarousel">
                        <img src="Content/new_images/pre.png" />
                    </a>
                    <a data-slide="next" href="#myCarousel">
                        <img src="Content/new_images/next.png" />
                    </a>
                </div>
            </div>
            <div class="span12">
                <div class="carousel slide" id="myCarousel">
                    <div class="carousel-inner">
                        <?php foreach ($item as $i => $page): ?>
                            <div class="item <?= $i === 0 ? 'active' : '' ?>">
                                <?php $mainProduct = array_shift($page); ?>
                                <div class="col-md-6 moule-show">
                                    <div class="news-img">
                                        <a title="<?= $mainProduct['details'][0]['title'] ?>" href="<?= Url::to(['product/index', 'id' => $mainProduct['id']]) ?>">
                                            <img alt="<?= $mainProduct['details'][0]['title'] ?>" src="<?= $mainProduct['details'][0]['thumbnail'] ?>" />
                                        </a>
                                    </div>
                                    <div class="des">
                                        <div class="news-name">
                                            <a href="<?= Url::to(['product/index', 'id' => $mainProduct['id']]) ?>"><?= $mainProduct['details'][0]['title'] ?></a>
                                        </div>
                                        <div class="news-cate">
                                            <a><?= Helpers::getFor($mainProduct['for']) ?></a>
                                        </div>
                                        <div class="news-readmore">
                                            <p><?= $mainProduct['details'][0]['summary'] ?></p>
                                        </div>
                                        <div class="news-proce">
                                            <?= Yii::t('app', 'RENTAL') ?>: <span style="color:#dd5626">
                                                $<?= Yii::$app->formatter->asDecimal($mainProduct['price'], 0) ?>
                                                <?php if ($mainProduct['for'] == Product::FOR_RENT): ?>
                                                    / <?= Yii::t('app', 'month') ?>
                                                <?php endif ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 module-relate">
                                    <?php foreach ($page as $product): ?>
                                    <div class="module-item">
                                        <div class="module-item-img col-xs-5 col-md-4">
                                            <a title="<?= $product['details'][0]['title'] ?>" href="<?= Url::to(['product/index', 'id' => $product['id']]) ?>">
                                                <img alt="<?= $product['details'][0]['title'] ?>" src="<?= $product['details'][0]['thumbnail'] ?>" />
                                            </a>
                                        </div>
                                        <div class="module-item-des col-md-8">
                                            <div class="news-name">
                                                <a href="<?= Url::to(['product/index', 'id' => $product['id']]) ?>"><?= $product['details'][0]['title'] ?></a>
                                            </div>
                                            <div class="news-cate">
                                                <a><?= Helpers::getFor($product['for']) ?></a>
                                            </div>
                                            <div class="news-readmore">
                                                <p><?= $product['details'][0]['summary'] ?></p>
                                            </div>
                                            <div class="news-proce">
                                                <?= Yii::t('app', 'RENTAL') ?>: <span style="color:#dd5626">
                                                    $<?= Yii::$app->formatter->asDecimal($product['price'], 0) ?>
                                                    <?php if ($product['for'] == Product::FOR_RENT): ?>
                                                        / <?= Yii::t('app', 'month') ?>
                                                    <?php endif ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div><!-- /#myCarousel -->
            </div><!-- /.span12 -->
        </div>
        <?php endforeach ?>
    </div>
    <div class="col-md-4 col-right">
        <div class="box-option">
            <?= Html::beginForm(Url::to(['site/search']), 'get') ?>
                <?= Html::dropDownList('type', null, Helpers::getType(), ['class' => 'col6']) ?>
                <?= Html::dropDownList('for', null, Helpers::getFor(), ['class' => 'col6']) ?>
                <?= Html::dropDownList('location', null, Helpers::getLocations(), ['class' => 'col7']) ?>
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary col5']) ?>
            <?= Html::endForm() ?>
        </div>
        <div class="qc">
            <?php foreach ($ads as $ad): ?>
                <?php if (empty($ad->url)): ?>
                    <img src="<?= $ad->image ?>" />
                <?php else: ?>
                    <a href="<?= $ad->url ?>"><img src="<?= $ad->image ?>" /></a>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="news-feature">
            <h1><?= Yii::t('app', 'NEWS') ?></h1>
            <div class="show-news">
                <?php foreach ($posts as $post): ?>
                    <div class="show-news-item col-md-6">
                        <div class="img-news">
                            <a href="<?= Url::to(['post/index', 'id' => $post->id]) ?>"><img src="<?= $post->details[0]->thumbnail ?>" /></a>
                        </div>
                        <div class="name-news">
                            <p><a style="color: black; font-size: 14px;" href="<?= Url::to(['post/index', 'id' => $post->id]) ?>"><?= $post->details[0]->title ?></a></p>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

</div>