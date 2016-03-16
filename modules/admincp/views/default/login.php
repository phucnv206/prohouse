<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Đăng nhập quản trị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <div class="card-header"><?= $this->title ?></div>
                <div class="card-block">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'enableClientScript' => false,
                        'errorCssClass' => 'has-danger',
                        'fieldConfig' => ['errorOptions' => ['class' => 'text-help']]
                    ]);
                    ?>
                    <?= $form->field($model, 'username') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="text-xs-right">
                        <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>