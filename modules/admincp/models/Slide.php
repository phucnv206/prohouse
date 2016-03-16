<?php

namespace app\modules\admincp\models;

class Slide extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'slide';
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
