<?php

namespace app\modules\admincp\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
            'rememberMe' => 'Ghi nhớ'
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password_hash)) {
                $this->addError($attribute, 'Đăng nhập không hợp lệ.');
            }
        }
    }
    
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }
    
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find(['username' => $this->username])->limit(1)->one();
        }
        return $this->_user;
    }

}
