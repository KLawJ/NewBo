<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_case_prefix".
 *
 * @property integer $prefix_id
 * @property integer $court_id
 * @property string $prefix_content
 * @property string $created_on
 * @property string $modified_on
 */
class TblCasePrefix extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_case_prefix';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prefix_content'], 'required'],
            [['prefix_id', 'court_id'], 'integer'],
            [['created_on', 'modified_on'], 'safe'],
            [['prefix_content'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prefix_id' => 'Prefix ID',
            'court_id' => 'Court ID',
            'prefix_content' => 'Prefix Content',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }
}
