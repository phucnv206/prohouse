<?php

namespace app\models;

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
    
    public function getInfos()
    {
        return $this->hasMany(CategoryInfo::className(), ['category_id' => 'id']);
    }
    
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

}
