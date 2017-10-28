<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_lastlogged".
 *
 * @property integer $id
 * @property string $username
 * @property string $screen
 */
class IcoLastlogged extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_lastlogged';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'screen'], 'required'],
            [['username', 'screen'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'screen' => 'Screen',
        ];
    }
}
