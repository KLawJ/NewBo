<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_cities".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property string $city_state
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'city_state'], 'required'],
            [['city_name', 'city_state'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'city_state' => 'City State',
        ];
    }
}
