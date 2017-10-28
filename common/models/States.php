<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_states".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property integer $enabled
 * @property string $updated
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id'], 'required'],
            [['state_id', 'enabled'], 'integer'],
            [['updated'], 'safe'],
            [['state_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
            'enabled' => 'Enabled',
            'updated' => 'Updated',
        ];
    }
}
