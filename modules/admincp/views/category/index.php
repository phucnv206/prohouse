<?php

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Dự án';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', ['model' => $model, 'infos' => $infos, 'images' => $images]) ?>

    <table class="table table-striped">
        <thead class="thead-default">
            <tr>
                <th></th>
                <th>#</th>
                <th>Tên dự án</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?php if (empty($listItem)): ?>
                <tr>
                    <td colspan="5">Chưa có dữ liệu</td>
                <tr>
                <?php else: ?>
                    <?php foreach ($listItem as $k => $item): ?>
                    <tr id="<?= $item->id ?>">
                        <td><i class="fa fa-arrows"></i></td>
                        <th scope="row"><?= $k + 1 ?></th>
                        <td>
                            <?= $item->details[1]->title ?> /
                            <?= $item->details[0]->title ?>
                        </td>
                        <td><?= date('d/m/Y H:i', $item->created) ?></td>
                        <td><?= date('d/m/Y H:i', $item->modified) ?></td>
                        <td>
                            <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['index', 'id' => $item->id], ['class' => 'btn btn-link']) ?>
                            <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $item->id], ['class' => 'btn btn-link delete-btn']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
$this->registerCssFile('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', ['depends' => [\app\assets\AdminAsset::className()]]);
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\app\assets\AdminAsset::className()]]);
$this->registerJs("
    $('.delete-btn').click(function (e) {
        if (!confirm('Xác nhận xóa?')) {
            return e.preventDefault();
        }
    });
    $('#sortable').sortable();
    $('#sortable').disableSelection();
    $('#sortable').sortable({
        update: function( event, ui ) {
            var sorted = $('#sortable').sortable('toArray');
            $.get('reorder?sorted=' + sorted);
        }
    });
");
