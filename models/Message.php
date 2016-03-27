<?php

namespace app\models;
use Yii;

class Message extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'address', 'message'], 'required'],
            ['email', 'email'],
            ['phone', 'string', 'length' => [5, 20]],
            ['message', 'string'],
        ];
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
