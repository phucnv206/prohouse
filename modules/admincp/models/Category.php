<?php

namespace app\modules\admincp\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{

    public $titleVi;
    public $titleEn;

    public static function tableName()
    {
        return 'category';
    }

    public function getDetails()
    {
        return $this->hasMany(CategoryDetail::className(), ['category_id' => 'id'])->orderBy('lang DESC');
    }

    public function rules()
    {
        return [
            [['titleEn'], 'required'],
            [['titleVi', 'titleEn'], 'string', 'max' => 255],
            ['pos', 'integer', 'min' => 0]
        ];
    }

    public function attributeLabels()
    {
        return [
            'titleVi' => 'Tên dự án',
            'titleEn' => 'Tên dự án',
            'created' => 'Ngày tạo',
            'modified' => 'Ngày cập nhật',
            'status' => 'Trạng thái',
            'pos' => 'Thứ tự'
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
                foreach (Yii::$app->params['langs'] as $k => $lang) {
                    $detail = CategoryDetail::findOne(['category_id' => $this->id, 'lang' => $lang]);
                    $detail->title = $titles[$k];
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
            foreach (Yii::$app->params['langs'] as $k => $lang) {
                $detail = new CategoryDetail;
                $detail->category_id = $this->id;
                $detail->title = $titles[$k];
                $detail->lang = $lang;
                $detail->save();
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            CategoryDetail::deleteAll(['category_id' => $this->id]);
            $products = Product::find()->select('id')->where(['category_id' => $this->id])->all();
            $ids = [];
            foreach ($products as $product) {
                $ids[] = $product->id;
            }
            ProductDetail::deleteAll(['product_id' => $ids]);
            Product::deleteAll(['category_id' => $this->id]);
            $infos = CategoryInfo::find()->select('id')->where(['category_id' => $this->id])->all();
            $ids = [];
            foreach ($infos as $info) {
                $ids[] = $info->id;
            }
            CategoryInfoDetail::deleteAll(['category_info_id' => $ids]);
            CategoryInfo::deleteAll(['category_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

}