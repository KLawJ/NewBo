<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_courts".
 *
 * @property integer $court_id
 * @property string $court_code
 * @property string $court_name
 * @property integer $enabled
 * @property integer $sort_order
 */
class TblCourts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_courts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'court_name'], 'required'],
            [['court_id', 'court_name'], 'unique'],
            [['court_id', 'enabled', 'sort_order'], 'integer'],
            [['court_name'], 'string'],
            [['court_code'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'court_id' => 'Court ID',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'enabled' => 'Enabled',
            'sort_order' => 'Sort Order',
        ];
    }
}
