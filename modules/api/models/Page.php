<?php

namespace app\modules\api\models;

use Yii;

class Page extends \yii\db\ActiveRecord
{

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
