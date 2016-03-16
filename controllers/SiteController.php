<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Slide;
use app\models\Product;
use app\models\Post;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $products = Product::find()->with('details')->asArray()->all();
        $list = [];
        foreach ($products as $product) {
            $list[$product['type']][] = $product;
        }
        $posts = Post::find()->with('details')->all();
        return $this->render('index', [
            'list' => $list,
            'posts' => $posts
        ]);
    }
    
    public function actionLocation($lang = 'vi')
    {
        $sessLang = $lang === 'vi' ? 'vi-VN' : 'en-US';
        Yii::$app->session->set('lang', $sessLang);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
