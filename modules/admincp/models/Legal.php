<?php

namespace app\modules\admincp\models;

use Yii;

class Legal extends \yii\db\ActiveRecord
{

    public $titleVi;
    public $titleEn;
    public $contentVi;
    public $contentEn;

    public static function tableName()
    {
        return 'legal';
    }

    public function getDetails()
    {
        return $this->hasMany(LegalDetail::className(), ['legal_id' => 'id'])->orderBy('lang DESC');
    }

    public function rules()
    {
        return [
            [['titleEn'], 'required'],
            [['titleVi', 'titleEn'], 'string', 'max' => 255],
            [['contentVi', 'contentEn'], 'string'],
            ['type', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titleVi' => 'Tiêu đề',
            'titleEn' => 'Tiêu đề',
            'contentVi' => 'Chi tiết',
            'contentEn' => 'Chi tiết',
            'created' => 'Ngày tạo',
            'modified' => 'Ngày cập nhật',
            'status' => 'Trạng thái',
            'type' => 'Legal Update',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created = $this->modified = time();
            } else {
                $this->modified = time();
                $titles = [$this->titleVi, $this->titleEn];
                $contents = [$this->contentVi, $this->contentEn];
                foreach (Yii::$app->params['langs'] as $k => $lang) {
                    $detail = LegalDetail::findOne(['legal_id' => $this->id, 'lang' => $lang]);
                    $detail->title = $titles[$k];
                    $detail->content = $contents[$k];
                    $detail->save();
                }
            }
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $titles = [$this->titleVi, $this->titleEn];
            $contents = [$this->contentVi, $this->contentEn];
            foreach (Yii::$app->params['langs'] as $k => $lang) {
                $detail = new LegalDetail;
                $detail->legal_id = $this->id;
                $detail->title = $titles[$k];
                $detail->content = $contents[$k];
                $detail->lang = $lang;
                $detail->save();
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            LegalDetail::deleteAll(['legal_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }
}
