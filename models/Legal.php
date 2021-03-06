<?php

namespace app\models;

use Yii;

class Legal extends \yii\db\ActiveRecord
{

    const TYPE_LEGAL_UPDATE = 1;

    public static function tableName()
    {
        return 'legal';
    }

    public function getDetails()
    {
        return $this->hasMany(LegalDetail::className(), ['legal_id' => 'id'])
            ->where(['lang' => Yii::$app->language]);
    }

}
