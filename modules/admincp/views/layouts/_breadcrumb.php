<?php

use yii\helpers\Url;
?>
<ol class="breadcrumb">
    <?php if (isset($this->params['breadcrumbs'])): ?>
        <li><a href="<?= Url::toRoute('default/index') ?>">AdminCP</a></li>
        <?php foreach ($this->params['breadcrumbs'] as $breadcrumb): ?>
            <?php if (is_array($breadcrumb)): ?>
            <li><a href="<?= Url::toRoute($breadcrumb['url']) ?>"><?= $breadcrumb['label'] ?></a></li>
            <?php else: ?>
            <li class="active"><?= $breadcrumb ?></li>
            <?php endif ?>
        <?php endforeach; ?>
    <?php else: ?>
        <li>AdminCP</li>   
    <?php endif; ?>
</ol>