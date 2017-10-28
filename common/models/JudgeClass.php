<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_judge_class".
 *
 * @property integer $judge_class_id
 * @property string $judge_class
 * @property integer $enabled
 */
class JudgeClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_judge_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judge_class'], 'required'],
            [['judge_class_id'], 'integer'],
            [['judge_class'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'judge_class_id' => 'Judge Class ID',
            'judge_class' => 'Judge Class',
            'enabled' => 'Enabled',
        ];
    }
}
