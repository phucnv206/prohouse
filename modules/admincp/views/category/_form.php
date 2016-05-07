<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="category-form">
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([
    'enableClientScript' => false,
    'errorCssClass' => 'has-danger',
    'fieldConfig' => ['errorOptions' => ['class' => 'text-help']],
]);?>

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
                    <?=$form->field($model, 'titleEn')->textInput()?>
                </div>
                <div class="tab-pane" id="vi" role="tabpanel">
                    <?=$form->field($model, 'titleVi')->textInput()?>
                </div>
            </div>

            <?php if (!$model->isNewRecord): ?>
            <div class="images">
                <div class="row">
                    <?php foreach ($images as $image): ?>
                    <div class="col-sm-3">
                        <div class="text-xs-right"><a class="delete-img" href="<?=Url::to(['delete-image', 'id' => $image->id])?>"><i class="fa fa-times"></i></a></div>
                        <a href="<?=Url::to(['images', 'cateId' => $model->id, 'id' => $image->id])?>"><img class="img-fluid" src="<?=$image->image?>"></a>
                    </div>
                    <?php endforeach?>
                </div>
                <p><?=Html::a('<span class="label label-danger">Thêm ảnh</span>', ['images', 'cateId' => $model->id])?></p>
            </div>
            <?php endif;?>

            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
                <?php if (!$model->isNewRecord): ?>
                    <?=Html::a('Hủy bỏ', ['index'], ['class' => 'btn btn-link'])?>
                <?php endif;?>
            </div>

            <?php ActiveForm::end();?>
        </div>

        <div class="col-md-6">
            <?php if (!$model->isNewRecord): ?>
                <p><?=Html::a('<span class="label label-danger">Thêm nội dung</span>', ['info', 'cateId' => $model->id])?></p>
                <ul id="sortable-content" style="list-style: none; padding: 0">
                    <?php foreach ($infos as $info): ?>
                    <li id="<?=$info->id?>">
                        <i class="fa fa-arrows"></i>
                        <?=Html::a($info->details[0]->title . ' / ' . $info->details[1]->title, ['info', 'cateId' => $model->id, 'id' => $info->id], ['class' => 'btn btn-link'])?>
                        <?=Html::a('<i class="fa fa-times"></i>', ['delete-info', 'id' => $info->id], ['class' => 'btn btn-link delete-info-btn'])?>
                    </li>
                    <?php endforeach?>
                </ul>
            <?php endif?>
        </div>
    </div>
</div>
<?php
$this->registerJs("
    $('.delete-info-btn, .delete-img').click(function (e) {
        if (!confirm('Xác nhận xóa?')) {
            return e.preventDefault();
        }
    });
    $('#sortable-content').sortable();
    $('#sortable-content').disableSelection();
    $('#sortable-content').sortable({
        update: function( event, ui ) {
            var sorted = $('#sortable-content').sortable('toArray');
            $.get('reorder-info?sorted=' + sorted);
        }
    });
");
