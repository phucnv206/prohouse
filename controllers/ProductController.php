<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{

    public function actionIndex($id)
    {
        $model = Product::find()->where(['id' => $id])->with(['details'])->one();
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        $others = Product::find()->with(['details'])->where(['for' => $model->for, 'type' => $model->type])
                                ->andWhere('id != :id', [':id' => $model->id])->limit(3)->all();
        return $this->render('index', [
            'model' => $model,
            'others' => $others
        ]);
    }

}
