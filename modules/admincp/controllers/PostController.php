<?php

namespace app\modules\admincp\controllers;

use Yii;
use app\modules\admincp\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class PostController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex($id = null)
    {
        $model = $id === null ? new Post() : $this->findModel($id);
        if (!empty($model->details)) {
            $model->titleVi = $model->details[0]->title;
            $model->titleEn = $model->details[1]->title;
            $model->thumbnailVi = $model->details[0]->thumbnail;
            $model->thumbnailEn = $model->details[1]->thumbnail;
            $model->summaryVi = $model->details[0]->summary;
            $model->summaryEn = $model->details[1]->summary;
            $model->contentVi = $model->details[0]->content;
            $model->contentEn = $model->details[1]->content;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $listItem = Post::find()->with('details')->all();
            return $this->render('index', [
                'model' => $model,
                'listItem' => $listItem,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
