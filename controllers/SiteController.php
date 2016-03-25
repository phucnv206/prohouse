<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\Post;
use app\components\Helpers;
use app\models\User;
use app\models\ContactForm;
use app\models\Ads;
use app\models\Page;

class SiteController extends Controller
{
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($test = null)
    {
        if ($test) {
            Yii::$app->session->set('test', true);
            return $this->goHome();
        }
        if (!Yii::$app->session->has('test')) die('Coming soon...');
        $products = Product::find()->with('details')->orderBy('type, id DESC')->asArray()->all();
        $list = [];
        foreach ($products as $product) {
            if (empty($list[$product['type']])) {
                $list[$product['type']] = [[$product]];
            } elseif (count($last = array_pop($list[$product['type']])) < 4) {
                $last[] = $product;
                $list[$product['type']][] = $last;
            } else {
                $list[$product['type']][] = $last;
                $list[$product['type']][] = [$product];
            }
        }
        $posts = Post::find()->with('details')->orderBy('id DESC')->all();
        $ads = Ads::find()->orderBy('id DESC')->all();
        return $this->render('index', [
            'list' => $list,
            'posts' => $posts,
            'ads' => $ads
        ]);
    }
    
    public function actionSearch($type = null, $for = null, $location = null)
    {
        $query = Product::find()->with('details')->orderBy('id DESC');
        if ($type !== null) {
            $query->andWhere(['type' => $type]);
        }
        if ($for !== null) {
            $query->andWhere(['for' => $for]);
        }
        if ($location !== null) {
            $locations = current(Helpers::getLocations());
            if (isset($locations[$location])) {
                $query->andWhere(['location' => $location]);
            }
        }
        $products = $query->all();
        $posts = Post::find()->with('details')->orderBy('id DESC')->all();
        $ads = Ads::find()->orderBy('id DESC')->all();
        return $this->render('search', [
            'products' => $products,
            'posts' => $posts,
            'type' => $type,
            'for' => $for,
            'location' => $location,
            'ads' => $ads
        ]);
    }
    
    public function actionContact()
    {
        $user = User::findOne(1);
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->mailer->compose('contact', ['model' => $model])
            ->setFrom(Yii::$app->params['mailUser'])
            ->setTo($user->email)
            ->setSubject('Thông tin liên hệ - ' . Yii::$app->params['title'])
            ->send();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Message has been sent successfully!'));
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        $model = Page::find()->where(['id' => Page::PAGE_ABOUT])->with('details')->one();
        return $this->render('about', ['model' => $model]);
    }

    public function actionLocation($lang = 'vi')
    {
        $sessLang = $lang === 'vi' ? 'vi-VN' : 'en-US';
        Yii::$app->session->set('lang', $sessLang);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
