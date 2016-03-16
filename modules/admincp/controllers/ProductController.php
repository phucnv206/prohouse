<?php

namespace app\modules\admincp\controllers;

use Yii;
use app\modules\admincp\models\Product;
use app\modules\admincp\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class ProductController extends Controller
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
        $model = $id === null ? new Product() : $this->findModel($id);
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
            $listItem = Product::find()->with('details')->all();
            $category = Category::find()->with('details')->all();
            $listCate = [];
            foreach ($category as $cate) {
                $listCate[$cate->id] = $cate->details[0]->title . ' / ' . $cate->details[1]->title;
            }
            return $this->render('index', [
                'model' => $model,
                'listItem' => $listItem,
                'listCate' => $listCate
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
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
