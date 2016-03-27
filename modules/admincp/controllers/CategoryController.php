<?php

namespace app\modules\admincp\controllers;

use Yii;
use app\modules\admincp\models\Category;
use app\modules\admincp\models\CategoryInfo;
use app\modules\admincp\models\CategoryImages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class CategoryController extends Controller
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
        if ($id === null) {
            $model = new Category;
            $infos = [];
			$images = [];
        } else {
            $model = $this->findModel($id);
            $infos = CategoryInfo::find()->where(['category_id' => $id])->with('details')->all();
            $images = CategoryImages::find()->where(['category_id' => $id])->all();
        }
        if (!empty($model->details)) {
            $model->titleVi = $model->details[0]->title;
            $model->titleEn = $model->details[1]->title;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $model->pos = 0;
            $listItem = Category::find()->with('details')->orderBy('pos ASC, id DESC')->all();
            return $this->render('index', [
                'model' => $model,
                'listItem' => $listItem,
                'infos' => $infos,
                'images' => $images
            ]);
        }
    }
    
    public function actionInfo($cateId, $id = null)
    {
        $model = $id === null ? new CategoryInfo : CategoryInfo::findOne($id);
        $model->category_id = $cateId;
        if (!empty($model->details)) {
            $model->titleVi = $model->details[0]->title;
            $model->titleEn = $model->details[1]->title;
            $model->contentVi = $model->details[0]->content;
            $model->contentEn = $model->details[1]->content;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $cateId]);
        } else {
            return $this->render('info', [
                'model' => $model,
                'cateId' => $cateId
            ]);
        }
    }
    
    public function actionImages($cateId, $id = null)
    {
        $model = $id === null ? new CategoryImages : CategoryImages::findOne($id);
        $model->category_id = $cateId;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $cateId]);
        } else {
            return $this->render('images', [
                'model' => $model,
                'cateId' => $cateId
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    public function actionDeleteInfo($id)
    {
        if (($model = CategoryInfo::findOne($id)) !== null) {
            $cateId = $model->category_id;
            $model->delete();
            return $this->redirect(['index', 'id' => $cateId]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDeleteImage($id)
    {
        if (($model = CategoryImages::findOne($id)) !== null) {
            $cateId = $model->category_id;
            $model->delete();
            return $this->redirect(['index', 'id' => $cateId]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionReorder($sorted)
    {
        $sorted = explode(',', $sorted);
        foreach ($sorted as $i => $id) {
            Yii::$app->db->createCommand()->update('category', ['pos' => $i], ['id' => $id])->execute();
        }
        die('ok');
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
