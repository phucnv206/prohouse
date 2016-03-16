<?php

namespace app\modules\api\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getDetails()
    {
        return $this->hasMany(CategoryDetail::className(), ['category_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }

}
