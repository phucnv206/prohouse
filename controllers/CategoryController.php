<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use app\models\CategoryInfo;
use app\models\CategoryImages;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{

    public function actionIndex($id)
    {
        $model = Category::find()->where(['id' => $id])->with(['details'])->one();
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        $infos = CategoryInfo::find()->where(['category_id' => $model->id])->with('details')->all();
        $images = CategoryImages::find()->where(['category_id' => $model->id])->all();
        return $this->render('index', [
            'model' => $model,
            'infos' => $infos,
            'images' => $images
        ]);
    }

}
