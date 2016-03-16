<?php

namespace app\models;

use Yii;

class Post extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'post';
    }

    public function getDetails()
    {
        return $this->hasMany(PostDetail::className(), ['post_id' => 'id'])
        ->where(['lang' => Yii::$app->language]);
    }

}
