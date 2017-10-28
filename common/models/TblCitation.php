<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_citation".
 *
 * @property integer $citation_id
 * @property string $citation_title
 * @property string $citation_format
 * @property string $citation_template
 * @property integer $enabled
 */
class TblCitation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_citation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                [['citation_title'], 'required'],
         [['citation_id', 'citation_title'], 'unique'],
            [['citation_id', 'enabled'], 'integer'],
            [['citation_title', 'citation_format', 'citation_template'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'citation_id' => 'Citation ID',
            'citation_title' => 'Citation Title',
            'citation_format' => 'Citation Format',
            'citation_template' => 'Citation Template',
            'enabled' => 'Enabled',
        ];
    }
}
