<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Slide;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SlideController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'list' => ['get'],
                ],
            ],
        ];
    }

    public function actionList()
    {
        $model = Slide::find()->all();
        $data = [];
        foreach ($model as $item) {
            $data[] = [
                'image' => $item->image,
                'url' => $item->url
            ];
        }
        return $data;
    }

}
