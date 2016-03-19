<?php

use yii\helpers\Html;

$this->title = 'Quảng cáo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-7">
            <table class="table table-striped">
                <thead class="thead-default">
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Liên kết</th>
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
                                    <img src="<?= $item->image ?>" height="50">
                                </td>
                                <td><?= $item->url ?></td>
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
        <div class="col-md-5">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
<?php $this->registerJs("
    $('.delete-btn').click(function (e) {
        if (!confirm('Xác nhận xóa?')) {
            return e.preventDefault();
        }
    });
");