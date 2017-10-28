<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_log".
 *
 * @property integer $id
 * @property string $tbl_name
 * @property integer $tbl_pid
 * @property string $user_id
 * @property string $mode
 * @property string $date
 */
class IcoLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tbl_name', 'tbl_pid', 'user_id', 'mode', 'date'], 'required'],
            [['tbl_pid'], 'integer'],
            [['tbl_name'], 'string', 'max' => 100],
            [['user_id'], 'string', 'max' => 20],
            [['mode'], 'string', 'max' => 10],
            [['date'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tbl_name' => 'Tbl Name',
            'tbl_pid' => 'Tbl Pid',
            'user_id' => 'User ID',
            'mode' => 'Mode',
            'date' => 'Date',
        ];
    }
}
