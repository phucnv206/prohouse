<?php
use yii\helpers\Html;
use app\components\Helpers;
?>
<header>

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 head-left">
                    <div title="HOTLINE">
                        <span style="color:white">
                            <?php foreach (Helpers::listCategories() as $i => $category): ?>
                                <?php if ($i > 0): ?>
                                    <span style="color:#7c7c7c"> | </span>
                                <?php endif ?>
                                <?= Html::a($category->details[0]->title, ['category/index', 'id' => $category->id], ['style' => 'color:white']) ?>
                            <?php endforeach ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 head-right">
                    <ul>
                        <li><a title="" href="#">Hotline: <span style="color:#2196f5">0917 187 909</span></a></li>
                        <li><a title="" href="#">About <span style="color:#7c7c7c">|</span></a></li>
                        <li class="last"><a title="" href="/Contact.html">Contact</a></li>
                        <li>
                            <img src="/Content/new_images/us.png" />
                            <img src="/Content/new_images/vn.png" />
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
                    <a title="Prohouse" style="cursor:pointer" href="/"><img alt="logo" src="/Content/new_images/logo.png" /></a>
                </div>

                <div class="col-md-offset-2 col-md-7  main-menu" id='cssmenu'>
                    <ul>
                        <li>
                            <a title="TRANG CHỦ" href="/">
                                FOR RENT
                            </a>

                        </li>
                        <li>
                            <a title="K&#205;NH M&#193;T" href="/errorpage">FOR SALE</a>
                        </li>
                        <li>
                            <a title="GỌNG K&#205;NH" href="/errorpage">APARTMENT</a>
                        </li>
                        <li>
                            <a title="TR&#210;NG K&#205;NH" href="/errorpage">OFFICE</a>
                        </li>
                        <li>
                            <a title="K&#205;NH &#193;P TR&#210;NG" href="/errorpage">HOUSE</a>
                        </li>

                        <li>
                            <a title="Tìm kiếm" href="#">
                                <img src="/Content/new_images/magnifier12.png" />
                            </a>
                        </li>

                    </ul>
                </div>



            </div>
        </div>
    </div>

</header>