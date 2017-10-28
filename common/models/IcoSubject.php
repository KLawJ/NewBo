<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_subject".
 *
 * @property integer $id
 * @property string $subject
 */
class IcoSubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject'], 'required'],
            [['subject'], 'string', 'max' => 300],
            [['subject'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
        ];
    }
}
