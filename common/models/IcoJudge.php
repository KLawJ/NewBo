<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_judge".
 *
 * @property integer $id
 * @property integer $case_id
 * @property integer $court_id
 * @property string $judge_name
 */
class IcoJudge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_judge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'court_id'], 'integer'],
            [['judge_name'], 'string'],
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
            'court_id' => 'Court ID',
            'judge_name' => 'Judge Name',
        ];
    }
}
