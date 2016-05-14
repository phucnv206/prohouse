<?php
    $this->title = $model->details[0]->title;
?>
<div class="container">
    <div class="legal-title"><?= $model->details[0]->title ?></div>
    <div class="text-justify responsive-content">
        <?= $model->details[0]->content ?>
    </div>
    <br><br>
</div>
<style>
    .legal-title {
        margin: 50px 0;
        font-size: 20px;
        color: #2196F3;
    }
</style>