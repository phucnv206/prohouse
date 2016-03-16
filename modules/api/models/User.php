<?php

namespace app\modules\api\models;

class User extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }

}
