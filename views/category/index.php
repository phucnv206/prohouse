<?php

use yii\helpers\Url;
?>
<?= $this->render('/layouts/_slider') ?>

<div class="container">
    <div class="menu-content ">
        <ul class="nav nav-tabs">
            <?php foreach ($infos as $i => $info): ?>
                <li class="<?= $i === 0 ? 'active' : '' ?>"><a data-toggle="tab" href="#info_<?= $info->id ?>"><?= $info->details[0]->title ?></a></li>
            <?php endforeach ?>
            <li><a class="btn-primary" href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Contact') ?></a></li>
        </ul>
        <div class="tab-content">
            <?php foreach ($infos as $i => $info): ?>
                <div id="info_<?= $info->id ?>" class="tab-pane fade <?= $i === 0 ? 'in active' : '' ?>">
                    <br>
                    <?= $info->details[0]->content ?>
                    <br>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>