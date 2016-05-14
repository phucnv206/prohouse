<?php

use app\components\Helpers;
use app\models\Product;
use yii\helpers\Url;
?>
<?=$this->render('/layouts/_slider')?>

<div class="container">
    <div class="col-md-8 col-left">
        <?php foreach ($list as $type => $item): ?>
        <div class="module">
            <?php
                $class = '';
                if ($type == Product::TYPE_OFFICE) {
                    $class = 'office';
                } elseif ($type == Product::TYPE_HOUSE) {
                    $class = 'house';
                }

            ?>
            <div class="module-name <?=$class?>">
                <a><?=Helpers::getType($type)?></a>
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
                            <div class="item <?=$i === 0 ? 'active' : ''?>">
                                <?php $mainProduct = array_shift($page);?>
                                <div class="col-md-6 moule-show">
                                    <div class="news-img">
                                        <a title="<?=$mainProduct['details'][0]['title']?>" href="<?=Url::to(['product/index', 'id' => $mainProduct['id'], 'title' => Helpers::getSlug($mainProduct['details'][0]['title'])])?>">
                                            <img alt="<?=$mainProduct['details'][0]['title']?>" src="<?=$mainProduct['details'][0]['thumbnail']?>" />
                                        </a>
                                    </div>
                                    <div class="des">
                                        <div class="news-name">
                                            <a href="<?=Url::to(['product/index', 'id' => $mainProduct['id'], 'title' => Helpers::getSlug($mainProduct['details'][0]['title'])])?>"><?=$mainProduct['details'][0]['title']?></a>
                                        </div>
                                        <div class="news-cate">
                                            <a><?=Helpers::getFor($mainProduct['for'])?></a>
                                        </div>
                                        <div class="news-readmore">
                                            <p><?=$mainProduct['details'][0]['summary']?></p>
                                        </div>
                                        <div class="news-proce">
                                            <?=Helpers::getPriceLabel($mainProduct['for'])?>:
                                            <span style="color:#dd5626">
                                                <?=Helpers::getPriceFormat($mainProduct)?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 module-relate">
                                    <?php foreach ($page as $product): ?>
                                    <div class="module-item">
                                        <div class="module-item-img col-xs-5 col-md-4">
                                            <a title="<?=$product['details'][0]['title']?>" href="<?=Url::to(['product/index', 'id' => $product['id'], 'title' => Helpers::getSlug($product['details'][0]['title'])])?>">
                                                <img alt="<?=$product['details'][0]['title']?>" src="<?=$product['details'][0]['thumbnail']?>" />
                                            </a>
                                        </div>
                                        <div class="module-item-des col-md-8">
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
                        <?php endforeach?>
                    </div>
                </div><!-- /#myCarousel -->
            </div><!-- /.span12 -->
        </div>
        <?php endforeach?>
    </div>
    <div class="col-md-4 col-right">
        <?=$this->render('_rightbox', [
            'ads' => $ads,
            'posts' => $posts,
            'type' => null,
            'for' => null,
            'location' => null
        ])?>
    </div>

</div>