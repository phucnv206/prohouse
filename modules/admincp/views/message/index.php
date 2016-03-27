<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <table class="table table-striped">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Người gửi</th>
                <th>Ngày gửi</th>
                <th>Lời nhắn</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listItem)): ?>
                <tr>
                    <td colspan="4">Chưa có dữ liệu</td>
                <tr>
                <?php else: ?>
                    <?php foreach ($listItem as $k => $item): ?>
                    <tr>
                        <th scope="row"><?= $k + 1 ?></th>
                        <td>
                            <ul>
                                <li>Tên: <b><?= $item->name ?></b></li>
                                <li>Điện thoại: <b><?= $item->phone ?></b></li>
                                <li>Email: <b><?= $item->email ?></b></li>
                                <li>Địa chỉ: <b><?= $item->address ?></b></li>
                            </ul>
                        </td>
                        <td><?= date('H:i d/m/Y', $item->created) ?></td>
                        <td><?= $item->message ?></td>
                        <td>
                            <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $item->id], ['class' => 'btn btn-link delete-btn']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>
<?php
$this->registerJs("
    $('.delete-btn').click(function (e) {
        if (!confirm('Xác nhận xóa?')) {
            return e.preventDefault();
        }
    });
");
$this->registerCss("
    ul.pagination li {
        display: inline-block;
    }
    ul.pagination li.active a {
        pointer-events: none;
        cursor: default;
        color: inherit;
    }

");
