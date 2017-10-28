<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_lawyer_type".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $area_of_pract
 */
class LawyerType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_lawyer_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'string', 'max' => 100],
            [['area_of_pract'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'area_of_pract' => 'Area Of Pract',
        ];
    }
}
