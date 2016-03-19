<?php

namespace app\modules\admincp\models;

class Ads extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'ads';
    }

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image', 'url'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Đường dẫn',
            'url' => 'Liên kết',
        ];
    }

}
