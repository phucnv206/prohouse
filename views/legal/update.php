<?php

use yii\helpers\Url;
?>
<div class="container">
    <h3><?=Yii::t('app', 'Legal Update')?></h3>
    <ul>
        <?php foreach ($model as $i => $item): ?>
        <li>
            <a href="<?=Url::to(['legal/index', 'id' => $item['id']])?>">
                <?=$item['details'][0]['title']?>
            </a>
        </li>
        <?php endforeach?>
    </ul>
</div>
