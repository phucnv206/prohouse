<?php

namespace app\modules\admincp;

use Yii;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\admincp\controllers';
    public $layout = 'admincp';

    public function init()
    {
        parent::init();
        Yii::$app->language = 'vi-VN';
        Yii::$app->user->loginUrl = ['admincp/default/login'];
    }

}
