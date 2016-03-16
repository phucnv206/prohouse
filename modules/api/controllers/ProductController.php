<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Product;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ProductController extends Controller
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
        $model = Product::find()->with('details')->orderBy('id DESC')->all();
        $data = [];
        foreach ($model as $item) {
            $data[] = [
                'id' => $item->id,
                'category_id' => $item->category_id,
                'title' => $item->details[0]->title,
                'thumbnail' => $item->details[0]->thumbnail,
                'summary' => $item->details[0]->summary,
                'content' => $item->details[0]->content
            ];
        }
        return $data;
    }

}
