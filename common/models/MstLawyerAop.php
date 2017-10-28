<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_lawyer_aop".
 *
 * @property integer $id
 * @property string $area_of_pract
 */
class MstLawyerAop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_lawyer_aop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'area_of_pract' => 'Area Of Pract',
        ];
    }
}
