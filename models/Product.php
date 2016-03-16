<?php

namespace app\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{
    
    const FOR_RENT = 0;
    const FOR_SALE = 1;
    const TYPE_APARTMENT = 0;
    const TYPE_OFFICE = 1;
    const TYPE_HOUSE = 2;

    public static function tableName()
    {
        return 'product';
    }

    public function getDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['product_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }
    
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
