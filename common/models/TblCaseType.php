<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_case_type".
 *
 * @property integer $case_type_id
 * @property string $case_type_title
 * @property integer $enabled
 * @property string $updated_dt
 */
class TblCaseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_case_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_type_id', 'case_type_title'], 'required'],
            [['case_type_id', 'enabled'], 'integer'],
            [['case_type_title'], 'string'],
            [['updated_dt'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'case_type_id' => 'Case Type ID',
            'case_type_title' => 'Case Type Title',
            'enabled' => 'Enabled',
            'updated_dt' => 'Updated Dt',
        ];
    }
}
