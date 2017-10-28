<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_cal".
 *
 * @property integer $id
 * @property string $category
 * @property string $cal_date
 */
class IcoCal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_cal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'cal_date'], 'required'],
            [['cal_date'], 'safe'],
            [['category'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'cal_date' => 'Cal Date',
        ];
    }
}
