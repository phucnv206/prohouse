<?php

namespace app\modules\admincp\models;

use Yii;

class CategoryInfo extends \yii\db\ActiveRecord
{

    public $titleVi;
    public $titleEn;
    public $contentVi;
    public $contentEn;

    public static function tableName()
    {
        return 'category_info';
    }

    public function getDetails()
    {
        return $this->hasMany(CategoryInfoDetail::className(), ['category_info_id' => 'id'])->orderBy('lang DESC');
    }

    public function rules()
    {
        return [
            [['titleVi'], 'required'],
            [['titleVi', 'titleEn'], 'string', 'max' => 255],
            [['contentVi', 'contentEn'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titleVi' => 'Tiêu đề',
            'titleEn' => 'Tiêu đề',
            'contentVi' => 'Nội dung',
            'contentEn' => 'Nội dung',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                
            } else {
                $titles = [$this->titleVi, $this->titleEn];
                $contents = [$this->contentVi, $this->contentEn];
                foreach (Yii::$app->params['langs'] as $k => $lang) {
                    $detail = CategoryInfoDetail::findOne(['category_id' => $this->id, 'lang' => $lang]);
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
                $detail = new CategoryInfoDetail;
                $detail->category_info_id = $this->id;
                $detail->lang = $lang;
                $detail->title = $titles[$k];
                $detail->content = $contents[$k];
                $detail->save();
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            var_dump($this->id);exit;
            CategoryInfoDetail::deleteAll(['category_info_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

}