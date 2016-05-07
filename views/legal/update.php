<?php

?>
<div class="container">
    <h3><?=Yii::t('app', 'Legal Update')?></h3>
    <div class="panel-group" id="legal-update">
        <?php foreach ($model as $i => $item): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#legal-update" href="#collapse-<?=$i?>" style="display: block; text-decoration: none">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?=$item['details'][0]['title']?>
                    </a>
                </h4>
            </div>
            <div id="collapse-<?=$i?>" class="panel-collapse collapse <?=$i == 0 ? 'in' : ''?>">
                <div class="panel-body">
                    <?=$item['details'][0]['content']?>
                </div>
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>
