<?php
use yii\helpers\Html;

$this->title = 'Nội dung';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h3><?= Html::encode($this->title) ?></h3>
    
    <table class="table table-striped">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Tên trang</th>
                <th>Ngày cập nhật</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listItem as $k => $item): ?>
                <tr>
                    <th scope="row"><?= $k + 1 ?></th>
                    <td>
                        <?= $item->details[1]->title ?> /
                        <?= $item->details[0]->title ?>
                    </td>
                    <td><?= date('d/m/Y H:i', $item->modified) ?></td>
                    <td>
                        <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['index', 'id' => $item->id], ['class' => 'btn btn-link']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($model !== null): ?>
    <?= $this->render('_form', ['model' => $model]) ?>
    <?php endif ?>
</div>
