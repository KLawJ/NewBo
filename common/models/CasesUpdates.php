<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cases_updates".
 *
 * @property integer $case_id
 * @property string $citation
 * @property string $strParties
 * @property string $strCaseType
 * @property string $case_no
 * @property string $judgement_dt
 * @property string $case_dt
 */
class CasesUpdates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cases_updates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judgement_dt'], 'safe'],
            [['citation', 'strParties', 'strCaseType', 'case_no'], 'string', 'max' => 100],
            [['case_dt'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'case_id' => 'Case ID',
            'citation' => 'Citation',
            'strParties' => 'Str Parties',
            'strCaseType' => 'Str Case Type',
            'case_no' => 'Case No',
            'judgement_dt' => 'Judgement Dt',
            'case_dt' => 'Case Dt',
        ];
    }
}
