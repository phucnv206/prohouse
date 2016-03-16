<?php

namespace app\components;

use Yii;

class Init extends \yii\base\Component
{

    public function init()
    {
        if (Yii::$app->session->has('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        }
    }

}
