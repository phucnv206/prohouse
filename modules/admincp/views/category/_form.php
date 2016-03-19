<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="category-form">
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([
                'enableClientScript' => false,
                'errorCssClass' => 'has-danger',
                'fieldConfig' => ['errorOptions' => ['class' => 'text-help']]
            ]); ?>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#en">Tiếng Anh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#vi">Tiếng Việt</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="en" role="tabpanel">
                    <?= $form->field($model, 'titleEn')->textInput() ?>
                </div>
                <div class="tab-pane" id="vi" role="tabpanel">
                    <?= $form->field($model, 'titleVi')->textInput() ?>
                </div>
            </div>
            
            <?= $form->field($model, 'pos')->textInput(['type' => 'number', 'style' => 'width: 100px'])->hint('Ưu tiên số nhỏ') ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?php if (!$model->isNewRecord): ?>
                    <?= Html::a('Hủy bỏ', ['index'], ['class' => 'btn btn-link']) ?>
                <?php endif; ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        
        <div class="col-md-6">
            <?php if (!$model->isNewRecord): ?>
                <?= Html::a('+Thêm nội dung', ['info', 'cateId' => $model->id], ['class' => 'btn btn-link']) ?>
                <ul>
                    <?php foreach ($infos as $info): ?>
                    <li><?= Html::a($info->details[0]->title . ' / ' . $info->details[1]->title, ['info', 'cateId' => $model->id, 'id' => $info->id], ['class' => 'btn btn-link']) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
</div>
