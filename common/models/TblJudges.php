<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_judges".
 *
 * @property integer $judge_id
 * @property integer $court_id
 * @property integer $judge_class_id
 * @property string $judge_name
 * @property integer $enabled
 * @property string $updated_dt
 */
class TblJudges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_m_judges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judge_name'], 'required'],
            [['judge_id', 'judge_name'], 'unique'],
            [['judge_id', 'court_id'], 'integer'],
            [['updated_dt'], 'safe'],
            [['judge_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'judge_id' => 'Judge ID',
            'court_id' => 'Court ID',
          
            'judge_name' => 'Judge Name',
           
        ];
    }
}
