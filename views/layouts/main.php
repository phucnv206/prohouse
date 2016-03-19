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
        <link href="/Content/bootstrap.css" rel="stylesheet" />
        <link href="/Content/new_css/style_new.css" rel="stylesheet" />
        <link href="/Content/new_menu/styles.css" rel="stylesheet" />
        <link href="/Content/new_css/my_style.css" rel="stylesheet" />

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
        <!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
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