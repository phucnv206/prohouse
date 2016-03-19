<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Post;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{

    public function actionIndex($id)
    {
        $model = Post::find()->where(['id' => $id])->with(['details'])->one();
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
