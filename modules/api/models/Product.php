<?php

namespace app\modules\api\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function getDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['product_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }

}
