<?php

use yii\helpers\Url;
?>
<nav class="navbar navbar-light bg-faded">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#my-navbar">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="my-navbar">
        <a class="navbar-brand" href="<?= Url::toRoute('default/index') ?>"><?= Yii::$app->params['title'] ?></a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= Url::toRoute('/') ?>" target="_blank">Trang chủ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Quản lý</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= Url::toRoute('slide/index') ?>">Slide</a>
                    <a class="dropdown-item" href="<?= Url::toRoute('category/index') ?>">Dự án</a>
                    <a class="dropdown-item" href="<?= Url::toRoute('product/index') ?>">Sản phẩm</a>
                    <a class="dropdown-item" href="<?= Url::toRoute('post/index') ?>">Tin tức</a>
                    <a class="dropdown-item" href="<?= Url::toRoute('page/index') ?>">Nội dung</a>
                    <a class="dropdown-item" href="<?= Url::toRoute('ads/index') ?>">Quảng cáo</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-xs-right">
            <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('default/login') ?>">Đăng nhập</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('user/index') ?>">
                        <i class="fa fa-user"></i>
                        <?= Yii::$app->user->identity->username ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('default/logout') ?>">Thoát</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>