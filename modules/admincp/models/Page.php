<?php

namespace app\modules\admincp\models;

use Yii;

class Page extends \yii\db\ActiveRecord
{
    
    const PAGE_ABOUT = 1;
    const PAGE_PRODUCT = 2;
    const PAGE_PARTNER = 3;
    const PAGE_NEWS = 4;

    public $titleVi;
    public $titleEn;
    public $thumbnailVi;
    public $thumbnailEn;
    public $summaryVi;
    public $summaryEn;
    public $contentVi;
    public $contentEn;

    public static function tableName()
    {
        return 'page';
    }

    public function getDetails()
    {
        return $this->hasMany(PageDetail::className(), ['page_id' => 'id'])->orderBy('lang DESC');
    }

    public function rules()
    {
        return [
            [['titleVi', 'titleEn', 'thumbnailVi', 'thumbnailEn'], 'string', 'max' => 255],
            [['summaryVi', 'summaryEn'], 'string', 'max' => 500],
            [['contentVi', 'contentEn'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titleVi' => 'Tiêu đề',
            'titleEn' => 'Tiêu đề',
            'thumbnailVi' => 'Hình nền',
            'thumbnailEn' => 'Hình nền',
            'summaryVi' => 'Mô tả',
            'summaryEn' => 'Mô tả',
            'contentVi' => 'Chi tiết',
            'contentEn' => 'Chi tiết',
            'modified' => 'Ngày cập nhật',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->modified = time();
            $titles = [$this->titleVi, $this->titleEn];
            $thumbnails = [$this->thumbnailVi, $this->thumbnailEn];
            $summaries = [$this->summaryVi, $this->summaryEn];
            $contents = [$this->contentVi, $this->contentEn];
            foreach (Yii::$app->params['langs'] as $k => $lang) {
                $detail = PageDetail::findOne(['page_id' => $this->id, 'lang' => $lang]);
                $detail->title = $titles[$k];
                $detail->thumbnail = $thumbnails[$k];
                $detail->summary = $summaries[$k];
                $detail->content = $contents[$k];
                $detail->save();
            }
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $titles = [$this->titleVi, $this->titleEn];
            $thumbnails = [$this->thumbnailVi, $this->thumbnailEn];
            $summaries = [$this->summaryVi, $this->summaryEn];
            $contents = [$this->contentVi, $this->contentEn];
            foreach (Yii::$app->params['langs'] as $k => $lang) {
                $detail = new ProductDetail;
                $detail->product_id = $this->id;
                $detail->title = $titles[$k];
                $detail->thumbnail = $thumbnails[$k];
                $detail->summary = $summaries[$k];
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
            ProductDetail::deleteAll(['product_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

}
