<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_case_no".
 *
 * @property integer $id
 * @property integer $case_id
 * @property string $case_no
 */
class IcoCaseNo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_case_no';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id'], 'integer'],
            [['case_no'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'case_id' => 'Case ID',
            'case_no' => 'Case No',
        ];
    }
}
