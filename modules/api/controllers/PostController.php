<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Post;
use yii\web\Controller;
use yii\filters\VerbFilter;

class PostController extends Controller
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
        $model = Post::find()->with('details')->orderBy('id DESC')->all();
        $data = [];
        foreach ($model as $item) {
            $data[] = [
                'id' => $item->id,
                'title' => $item->details[0]->title,
                'thumbnail' => $item->details[0]->thumbnail,
                'summary' => $item->details[0]->summary,
                'content' => $item->details[0]->content
            ];
        }
        return $data;
    }

}
