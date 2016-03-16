<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\ContactForm;
use app\modules\api\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ContactController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send' => ['post'],
                ],
            ],
        ];
    }

    public function actionSend()
    {
        $user = User::findOne(1);
        $model = new ContactForm();
        $model->attributes = Yii::$app->request->post();
        if ($model->validate()) {
            Yii::$app->mailer->compose('contact', ['model' => $model])
            ->setFrom(Yii::$app->params['mailUser'])
            ->setTo($user->email)
            ->setSubject('Thông tin liên hệ - Pinut')
            ->send();
            return ['message' => Yii::t('app', 'Message has been sent successfully!')];
        }
        return ['errors' => $model->firstErrors];
    }

}
