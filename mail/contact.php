<?php

use yii\helpers\Html;
?>
Xin chào!<br><br>

Hệ thống vừa nhận được tin nhắn liên hệ từ khách hàng trên website <?= Yii::$app->params['title'] ?>.<br>
Thông tin chi tiết:<br><br>

Tên: <b><?= $model->name ?></b><br>
Điện thoại: <b><?= $model->phone ?></b><br>
Email: <b><?= $model->email ?></b><br>
Địa chỉ: <b><?= $model->address ?></b><br>
Nội dung:<br>
<em><?= Html::encode($model->message) ?></em>

