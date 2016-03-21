<?php

namespace app\models;

use Yii;

class Page extends \yii\db\ActiveRecord
{
    
    const PAGE_ABOUT = 1;
    const PAGE_PRODUCT = 2;
    const PAGE_PARTNER = 3;
    const PAGE_NEWS = 4;

    public static function tableName()
    {
        return 'page';
    }

    public function getDetails()
    {
        return $this->hasMany(PageDetail::className(), ['page_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }

}
