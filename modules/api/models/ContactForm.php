<?php

namespace app\modules\api\models;

use Yii;
use yii\base\Model;

class ContactForm extends Model
{

    public $company;
    public $email;
    public $phone;
    public $message;

    public function rules()
    {
        return [
            [['company', 'email', 'phone', 'message'], 'required'],
            ['email', 'email'],
            ['phone', 'string', 'length' => [5,20]],
            ['message', 'string'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'company' => Yii::t('app', 'Your Company'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    public function contact($email)
    {
        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->fullname])
//                ->setSubject($this->subject)
//                ->setTextBody($this->message)
//                ->send();
            return true;
        } else {
            return false;
        }
    }

}
