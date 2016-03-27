<?php

namespace app\modules\admincp\models;

class Message extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'message';
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

}
