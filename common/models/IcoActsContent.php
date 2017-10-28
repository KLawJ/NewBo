<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_acts_content".
 *
 * @property integer $act_id
 * @property resource $act_content
 */
class IcoActsContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_acts_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id'], 'required'],
            [['act_id'], 'integer'],
            [['act_content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'act_id' => 'Act ID',
            'act_content' => 'Act Content',
        ];
    }
}
