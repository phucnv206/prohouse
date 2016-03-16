<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Category;
use yii\web\Controller;
use yii\filters\VerbFilter;

class CategoryController extends Controller
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
        $model = Category::find()->with('details')->all();
        $data = [];
        foreach ($model as $item) {
            $data[] = [
                'id' => $item->id,
                'title' => $item->details[0]->title
            ];
        }
        return $data;
    }

}
