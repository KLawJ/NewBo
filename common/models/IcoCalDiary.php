<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_cal_diary".
 *
 * @property integer $id
 * @property string $c_date
 * @property string $note
 * @property string $type_1
 * @property string $type_2
 * @property string $uname
 * @property string $cr_date
 */
class IcoCalDiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_cal_diary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_date', 'note', 'type_1', 'type_2', 'u_name'], 'required'],
            [['c_date', 'cr_date'], 'safe'],
            [['note', 'type_1', 'type_2', 'u_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_date' => 'C Date',
            'note' => 'Note',
            'type_1' => 'Type 1',
            'type_2' => 'Type 2',
            'u_name' => 'Uname',
            'cr_date' => 'Cr Date',
        ];
    }
}
