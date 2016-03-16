<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'enableClientScript' => false,
        'errorCssClass' => 'has-danger',
        'fieldConfig' => ['errorOptions' => ['class' => 'text-help']]
    ]); ?>
    
    <?= $form->field($model, 'username')->textInput() ?>
    
    <?= $form->field($model, 'email')->textInput() ?>
    
    <a href="#" class="change-password">Đổi mật khẩu</a>
    
    <?= $form->field($model, 'password', ['inputOptions' => ['disabled' => true, 'class' => 'cp form-control']])->passwordInput() ?>
    
    <?= $form->field($model, 'password_repeat', ['inputOptions' => ['disabled' => true, 'class' => 'cp form-control']])->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Hủy bỏ', ['index'], ['class' => 'btn btn-link']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs("
    if ($('.cp').val().length > 0) {
        $('.cp').prop('disabled', false);
    }
    $('.change-password').click(function (e) {
        e.preventDefault();
        $('.cp').prop('disabled', false).first().focus();
    });
");