<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="legal-form">
    <?php
    $form = ActiveForm::begin([
        'enableClientScript' => false,
        'errorCssClass' => 'has-danger',
        'fieldConfig' => ['errorOptions' => ['class' => 'text-help']]
    ]);
    ?>
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
            <?= $form->field($model, 'contentEn')->textarea(['class' => 'content-area']) ?>
        </div>
        <div class="tab-pane" id="vi" role="tabpanel">
            <?= $form->field($model, 'titleVi')->textInput() ?>
            <?= $form->field($model, 'contentVi')->textarea(['class' => 'content-area']) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php if (!$model->isNewRecord): ?>
            <?= Html::a('Hủy bỏ', ['index'], ['class' => 'btn btn-link']) ?>
        <?php endif; ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJsFile('/js/tinymce/tinymce.min.js', ['depends' => [app\assets\AdminAsset::className()]]);
$this->registerJs("
    tinymce.init({
        selector: '.content-area',
        language: 'vi_VN',
        relative_urls: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste responsivefilemanager code',
            'textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print preview fullscreen',
        external_filemanager_path: '/js/filemanager/',
        filemanager_title: 'Quản lý tập tin',
        external_plugins: {'filemanager': '/js/filemanager/plugin.min.js'}
    });
");
