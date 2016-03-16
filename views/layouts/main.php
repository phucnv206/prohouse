<?php

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::$app->params['title'] ?></title>
        <?php $this->head() ?>
        <link href="/Content/new_css/style_new.css" rel="stylesheet" />
        <link href="/Content/bootstrap.css" rel="stylesheet" />
        <link href="/Content/new_menu/styles.css" rel="stylesheet" />
        <link href="/Content/new_css/my_style.css" rel="stylesheet" />

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="/Content/new_menu/script.js"></script>
    </head>
    <body>
        <?php $this->beginBody() ?>
            <?= $this->render('_header') ?>
            <?= $content ?>
            <?= $this->render('_footer') ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>