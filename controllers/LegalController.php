<?php

namespace app\controllers;

use app\models\Legal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LegalController extends Controller
{

    public function actionIndex($id)
    {
        $model = Legal::find()->where(['id' => $id])->with(['details'])->one();
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = Legal::find()->where(['type' => Legal::TYPE_LEGAL_UPDATE])->with(['details'])->all();
        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
