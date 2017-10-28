<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_acts_index".
 *
 * @property integer $a_id
 * @property string $act_id
 * @property string $chapter
 * @property string $section
 * @property string $updatedon
 * @property integer $enabled
 */
class IcoActsIndex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_acts_index';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updatedon'], 'safe'],
            [['enabled'], 'integer'],
            [['act_id', 'chapter', 'section'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a_id' => 'A ID',
            'act_id' => 'Act ID',
            'chapter' => 'Chapter',
            'section' => 'Section',
            'updatedon' => 'Updatedon',
            'enabled' => 'Enabled',
        ];
    }
}
