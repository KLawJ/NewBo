<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_headnote_section".
 *
 * @property integer $id
 * @property integer $headnote_id
 * @property integer $subject_id
 * @property integer $section_id
 * @property integer $value_1
 * @property integer $value_2
 * @property integer $value_3
 */
class IcoHeadnoteSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public $hsubject_id;
     public $hsection_id;
     public $hvalue_1=0;
     public $hvalue_2=0;
     public $hvalue_3=0;
    public static function tableName()
    {
        return 'ico_headnote_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['headnote_id' ], 'required'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'headnote_id' => 'Headnote ID',
            'subject_id' => 'Subject',
            'section_id' => 'Section',
            'value_1' => 'Value 1',
            'value_2' => 'Value 2',
            'value_3' => 'Value 3',
        ];
    }
}
