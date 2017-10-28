<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_acts".
 *
 * @property integer $act_id
 * @property string $act_title
 * @property string $act_date
 * @property integer $enabled
 * @property string $updatedon
 * @property integer $cate
 */
class IcoActs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ico_acts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_title'], 'string'],
            [['act_date', 'updatedon'], 'safe'],
            [['enabled', 'cate'], 'integer'],
            [['cate'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'act_id' => 'Act ID',
            'act_title' => 'Act Title',
            'act_date' => 'Act Date',
            'enabled' => 'Enabled',
            'updatedon' => 'Updatedon',
            'cate' => 'Cate',
        ];
    }
}
