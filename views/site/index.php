<?php
use app\components\Helpers;
use app\models\Product;
use yii\helpers\Url;
?>
<?= $this->render('/layouts/_slider') ?>

<div class="container">
    <div class="col-md-8 col-left">
        <?php foreach ($list as $type => $item): ?>
        <div class="module">
            <div class="module-name">
                <a><?= Helpers::getType($type) ?></a>
                <div class="dieu_huong">
                    <a href="#">
                        <img src="Content/new_images/pre.png" /></a>
                    <a href="#">
                        <img src="Content/new_images/next.png" />
                    </a>
                </div>
            </div>
            <?php if (count($item) > 0): ?>
                <?php $mainProduct = array_shift($item); ?>
                <div class="col-md-6 moule-show">
                    <div class="news-img">
                        <a href="<?= Url::to(['product/index', 'id' => $mainProduct['id']]) ?>">
                            <img src="<?= $mainProduct['details'][0]['thumbnail'] ?>" />
                        </a>
                    </div>
                    <div class="des">
                        <div class="news-name">
                            <a><?= $mainProduct['details'][0]['title'] ?></a>
                        </div>
                        <div class="news-cate">
                            <a><?= Helpers::getFor($mainProduct['for']) ?></a>
                        </div>
                        <div class="news-readmore">
                            <p><?= $mainProduct['details'][0]['summary'] ?></p>
                        </div>
                        <div class="news-proce">
                            RENTAL: <span style="color:#dd5626">
                                $<?= Yii::$app->formatter->asDecimal($mainProduct['price'], 0) ?>
                                <?php if ($mainProduct['for'] == Product::FOR_RENT): ?>
                                    / month
                                <?php endif ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 module-relate">
                    <?php foreach ($item as $product): ?>
                    <div class="module-item">
                        <div class="module-item-img col-xs-5 col-md-4">
                            <a href="<?= Url::to(['product/index', 'id' => $product['id']]) ?>">
                                <img src="<?= $product['details'][0]['thumbnail'] ?>" />
                            </a>
                        </div>
                        <div class="module-item-des col-md-8">
                            <div class="news-name">
                                <a><?= $product['details'][0]['title'] ?></a>
                            </div>
                            <div class="news-cate">
                                <a><?= Helpers::getFor($product['for']) ?></a>
                            </div>
                            <div class="news-readmore">
                                <p><?= $product['details'][0]['summary'] ?></p>
                            </div>
                            <div class="news-proce">
                                RENTAL: <span style="color:#dd5626">
                                    $<?= Yii::$app->formatter->asDecimal($product['price'], 0) ?>
                                    <?php if ($product['for'] == Product::FOR_RENT): ?>
                                        / month
                                    <?php endif ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="col-md-4 col-right">
        <div class="box-option">
            <select class="col6">
                <option>Apartment</option>
            </select>
            <select class="col6">
                <option>For rent</option>
            </select>
            <select class="col7">
                <option>Binh Thanh Dist</option>
            </select>
            <button class="btn btn-primary col5">Search</button>
        </div>
        <div class="qc">
            <img src="Content/new_images/qc1.png" />
            <img src="Content/new_images/qc2.png" />
        </div>
        <div class="news-feature">
            <h1>News</h1>
            <div class="show-news">
                <?php foreach ($posts as $post): ?>
                <div class="show-news-item col-md-6">
                    <div class="img-news">
                        <img src="<?= $post->details[0]->thumbnail ?>" />
                    </div>
                    <div class="name-news">
                        <p><?= $post->details[0]->title ?></p>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

</div>