<?php

namespace app\modules\admincp\controllers;

use Yii;
use app\modules\admincp\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class PageController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex($id = '')
    {
        $model = null;
        if (!empty($id)) {
            $model = $this->findModel($id);
            $model->titleVi = $model->details[0]->title;
            $model->titleEn = $model->details[1]->title;
            $model->thumbnailVi = $model->details[0]->thumbnail;
            $model->thumbnailEn = $model->details[1]->thumbnail;
            $model->summaryVi = $model->details[0]->summary;
            $model->summaryEn = $model->details[1]->summary;
            $model->contentVi = $model->details[0]->content;
            $model->contentEn = $model->details[1]->content;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $id]);
            }
        }
        $listItem = Page::find()->with('details')->all();
        return $this->render('index', [
            'model' => $model,
            'listItem' => $listItem
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
