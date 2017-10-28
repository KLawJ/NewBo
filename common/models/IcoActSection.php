<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_act_section".
 *
 * @property integer $id
 * @property integer $act_id
 * @property integer $a_id
 * @property string $section_title
 * @property string $section_content
 * @property string $class
 * @property string $updated
 */
class IcoActSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_act_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id', 'a_id'], 'integer'],
            [['section_content'], 'string'],
            [['updated'], 'safe'],
            [['section_title', 'class'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'act_id' => 'Act ID',
            'a_id' => 'A ID',
            'section_title' => 'Section Title',
            'section_content' => 'Section Content',
            'class' => 'Class',
            'updated' => 'Updated',
        ];
    }
}
