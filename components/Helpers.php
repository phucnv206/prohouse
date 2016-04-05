<?php

namespace app\components;

use Yii;
use app\models\Category;
use app\models\Slide;
use app\models\Legal;

class Helpers extends \yii\base\Component
{
    
    public static function listCategories()
    {
        return Category::find()->with('details')->orderBy('pos ASC, id DESC')->all();
    }
    
    public static function listLegal()
    {
        return Legal::find()->with('details')->orderBy('id DESC')->all();
    }
    
    public static function listSlides()
    {
        return Slide::find()->orderBy('id DESC')->all();
    }

    public static function getFor($index = null)
    {
        $arr = [
            \app\modules\admincp\models\Product::FOR_RENT => Yii::t('app', 'For rent'),
            \app\modules\admincp\models\Product::FOR_SALE => Yii::t('app', 'For sale'),
        ];
        if ($index !== null) {
            return $arr[$index];
        }
        return $arr;
    }
    
    public static function getType($index = null)
    {
        $arr = [
            \app\modules\admincp\models\Product::TYPE_APARTMENT => Yii::t('app', 'Apartment'),
            \app\modules\admincp\models\Product::TYPE_OFFICE => Yii::t('app', 'Office'),
            \app\modules\admincp\models\Product::TYPE_HOUSE => Yii::t('app', 'House'),
        ];
        if ($index !== null) {
            return $arr[$index];
        }
        return $arr;
    }
    
    public static function getLocations($id = null)
    {
        $data = json_decode(file_get_contents('./js/data.json'), true);
        $locations = $data[5]; // tphcm
        if ($id !== null) {
            return $locations['districts'][$id];
        }
        return [$locations['name'] => $locations['districts']];
    }

}
