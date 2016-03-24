<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
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
            
            <div class="images">
                <div class="row">
                    <?php foreach ($images as $image) : ?>
                    <div class="col-sm-3">
                        <a href="<?= Url::to(['images', 'cateId' => $model->id, 'id' => $image->id]) ?>"><img class="img-fluid" src="<?= $image->image ?>"></a>
                    </div>
                    <?php endforeach ?>
                </div>
                <p><?= Html::a('+Thêm ảnh', ['images', 'cateId' => $model->id], ['class' => 'btn btn-link']) ?></p>
            </div>

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
                    <li>
                        <?= Html::a($info->details[0]->title . ' / ' . $info->details[1]->title, ['info', 'cateId' => $model->id, 'id' => $info->id], ['class' => 'btn btn-link']) ?>
                        <?= Html::a('<i class="fa fa-times"></i>', ['delete-info', 'id' => $info->id], ['class' => 'btn btn-link delete-info-btn']) ?>
                    </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
</div>
<?php
$this->registerJs("
    $('.delete-info-btn').click(function (e) {
        if (!confirm('Xác nhận xóa?')) {
            return e.preventDefault();
        }
    });
");
