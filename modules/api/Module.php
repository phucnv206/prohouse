<?php

namespace app\modules\api;

use Yii;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
        parent::init();
        Yii::$app->request->parsers = ['application/json' => 'yii\web\JsonParser'];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }

}
