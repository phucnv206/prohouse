<?php

namespace app\modules\admincp\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    
    public $password;
    public $password_repeat;

    public static function tableName()
    {
        return 'user';
    }
    
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'string', 'length' => [4, 100]],
            ['password', 'string', 'min' => 6, 'when' => function($model) {
                return !empty($model->password);
            }],
            ['password_repeat', 'required', 'when' => function($model) {
                return !empty($model->password);
            }],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'when' => function($model) {
                return !empty($model->password);
            }],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
            'password_repeat' => 'Lặp lại mật khẩu',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->password)) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }

}
