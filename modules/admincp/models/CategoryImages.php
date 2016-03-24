<?php

namespace app\modules\admincp\models;


class CategoryImages extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category_images';
    }

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Hình ảnh',
        ];
    }

}