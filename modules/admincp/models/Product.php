<?php

namespace app\modules\admincp\models;
use Yii;

class Product extends \yii\db\ActiveRecord
{
    
    const FOR_RENT = 0;
    const FOR_SALE = 1;
    const TYPE_APARTMENT = 0;
    const TYPE_OFFICE = 1;
    const TYPE_HOUSE = 2;

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
        return 'product';
    }

    public function getDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['product_id' => 'id'])->orderBy('lang DESC');
    }

    public function rules()
    {
        return [
            [['titleVi', 'thumbnailVi', 'category_id', 'price'], 'required'],
            [['titleVi', 'titleEn', 'thumbnailVi', 'thumbnailEn'], 'string', 'max' => 255],
            [['summaryVi', 'summaryEn'], 'string', 'max' => 500],
            [['contentVi', 'contentEn'], 'string'],
            [['category_id', 'price'], 'integer'],
            [['for', 'type', 'location'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'titleVi' => 'Tên sản phẩm',
            'titleEn' => 'Tên sản phẩm',
            'thumbnailVi' => 'Hình ảnh',
            'thumbnailEn' => 'Hình ảnh',
            'summaryVi' => 'Mô tả',
            'summaryEn' => 'Mô tả',
            'contentVi' => 'Chi tiết',
            'contentEn' => 'Chi tiết',
            'category_id' => 'Dự án',
            'created' => 'Ngày tạo',
            'modified' => 'Ngày cập nhật',
            'price' => 'Đơn giá',
            'status' => 'Trạng thái',
            'for' => 'Hình thức',
            'type' => 'Kiểu',
            'location' => 'Địa điểm'
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
                $thumbnails = [$this->thumbnailVi, $this->thumbnailEn];
                $summaries = [$this->summaryVi, $this->summaryEn];
                $contents = [$this->contentVi, $this->contentEn];
                foreach (Yii::$app->params['langs'] as $k => $lang) {
                    $detail = ProductDetail::findOne(['product_id' => $this->id, 'lang' => $lang]);
                    $detail->title = $titles[$k];
                    $detail->thumbnail = $thumbnails[$k];
                    $detail->summary = $summaries[$k];
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
