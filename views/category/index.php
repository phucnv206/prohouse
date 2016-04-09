<?php

use yii\helpers\Url;
?>
<?= $this->render('/layouts/_slider', ['images' => $images]) ?>

<div class="container">
    <div class="menu-content">
        <ul class="nav nav-tabs" data-spy="affix" data-offset-top="524" data-offset-bottom="200">
            <?php foreach ($infos as $i => $info): ?>
                <li class="<?= $i === 0 ? 'active' : '' ?>"><a data-toggle="tab" href="#info_<?= $info->id ?>"><?= $info->details[0]->title ?></a></li>
            <?php endforeach ?>
            <li><a class="btn-primary contact-btn" href="<?= Url::to(['site/contact']) ?>">0917 187 909</a></li>
        </ul>
        <div class="tab-content">
            <?php foreach ($infos as $i => $info): ?>
                <div id="info_<?= $info->id ?>" class="tab-pane fade <?= $i === 0 ? 'in active' : '' ?>">
                    <br>
                    <div class="responsive-content"><?= $info->details[0]->content ?></div>
                    <br>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php
$this->registerCss("
.menu-content ul.nav.affix {
    top: 0;
    background-color: #FFF;
    left: 0;
    right: 0;
    margin: auto;
    max-width: 1140px;
}
.menu-content ul.nav.affix + .tab-content {
    margin-top: 60px;
}
.menu-content .contact-btn:hover,
.menu-content .contact-btn:focus {
    background-color: #286090;
}

");
?>