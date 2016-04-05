<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Legal;
use yii\web\NotFoundHttpException;

class LegalController extends Controller
{

    public function actionIndex($id)
    {
        $model = Legal::find()->where(['id' => $id])->with(['details'])->one();
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
