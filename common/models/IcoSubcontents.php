<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ico_subcontents".
 *
 * @property integer $id
 * @property integer $own_id
 * @property integer $subject_id
 * @property integer $subs_id
 * @property string $contents
 */
class IcoSubcontents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

 public $hsubject_id;
     public $hsection_id;
     public $hvalue_1=0;
     public $hvalue_2=0;
     public $hvalue_3=0;
public $value_1;
public $value_2;
public $value_3;
    
    public static function tableName()
    {
        return 'ico_subcontents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['own_id'], 'integer'],
            [['contents'], 'unique', 'targetAttribute' => ['contents', 'subject_id','subs_id','own_id']],
            [['subject_id', 'subs_id'], 'required'],
          
            [['contents'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'own_id' => 'Own ID',
            'subject_id' => 'Subject',
            'subs_id' => 'Sub',
            'contents' => 'Contents',
        ];
    }




}
