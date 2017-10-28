<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_cases_judgement".
 *
 * @property integer $case_id
 * @property string $judgement_content
 * @property string $headnote_content
 */
class TblCasesJudgement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cases_judgement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'judgement_content'], 'required'],
            [['case_id'], 'integer'],
            [['judgement_content', 'headnote_content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'case_id' => 'Case ID',
            'judgement_content' => 'Judgement Content',
            'headnote_content' => 'Headnote Content',
        ];
    }
}
