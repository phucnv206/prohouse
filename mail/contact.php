<?php

use yii\helpers\Html;
?>
Xin chào!<br><br>

Hệ thống vừa nhận được tin nhắn liên hệ từ khách hàng trên website pinut.com.vn.<br>
Thông tin chi tiết:<br><br>

Tên công ty: <b><?= $model->company ?></b><br>
Email: <b><?= $model->email ?></b><br>
Điện thoại: <b><?= $model->phone ?></b><br>
Nội dung:<br>
<em><?= Html::encode($model->message) ?></em>

