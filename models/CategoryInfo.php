<?php

namespace app\models;

use Yii;

class CategoryInfo extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category_info';
    }

    public function getDetails()
    {
        return $this->hasMany(CategoryInfoDetail::className(), ['category_info_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }

}