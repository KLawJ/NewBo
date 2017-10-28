<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_ref_citation".
 *
 * @property integer $id
 * @property integer $case_id
 * @property string $citation
 */
class IcoRefCitation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_ref_citation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id'], 'integer'],
            [['citation'], 'string'],
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
            'citation' => 'Citation',
        ];
    }
}
