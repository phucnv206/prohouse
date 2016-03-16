<?php

use yii\helpers\Html;

$this->title = 'Thông tin quản trị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>