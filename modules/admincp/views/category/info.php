<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Dự án', 'url' => ['index', 'id' => $cateId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-info">

    <h3><?= Html::encode($this->title) ?></h3>

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
            <?= $form->field($model, 'contentEn')->textarea(['class' => 'content-area']) ?>
        </div>
        <div class="tab-pane" id="vi" role="tabpanel">
            <?= $form->field($model, 'titleVi')->textInput() ?>
            <?= $form->field($model, 'contentVi')->textarea(['class' => 'content-area']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Hủy bỏ', ['index', 'id' => $cateId], ['class' => 'btn btn-link']) ?>
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
            'insertdatetime media table contextmenu paste responsivefilemanager code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print preview fullscreen',
        external_filemanager_path: '/js/filemanager/',
        filemanager_title: 'Quản lý tập tin',
        external_plugins: {'filemanager': '/js/filemanager/plugin.min.js'}
    });
    $('#browse-btn-vi').click(function () {
        var url = '/js/filemanager/dialog.php?type=1&popup=1&field_id=browse-img-vi';
        open_popup(url);

    });
    $('#browse-btn-en').click(function () {
        var url = '/js/filemanager/dialog.php?type=1&popup=1&field_id=browse-img-en';
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
