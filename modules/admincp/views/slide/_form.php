<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin([
        'enableClientScript' => false,
        'errorCssClass' => 'has-danger',
        'fieldConfig' => ['errorOptions' => ['class' => 'text-help']]
    ]); ?>
    
    <?= $form->field($model, 'image', [
        'inputOptions' => ['id' => 'browse-img', 'class' => 'form-control'],
        'template' => '{label}<div class="input-group">{input}<span class="input-group-btn"><button type="button" id="browse-btn" class="btn btn-default"><i class="fa fa-search"></i></a></span></div>'
    ])->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'url')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php if (!$model->isNewRecord): ?>
            <?= Html::a('Hủy bỏ', ['index'], ['class' => 'btn btn-link']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs("
    $('#browse-btn').click(function () {
        var url = '/js/filemanager/dialog.php?type=1&popup=1&field_id=browse-img';
        open_popup(url);

    });
    function open_popup(url)
    {
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width - w) / 2);
        var t = Math.floor((screen.height - h) / 2);
        window.open(url, 'Media Manager', 'scrollbars=1,width=' + w + ',height=' + h + ',top=' + t + ',left=' + l);
    }
");