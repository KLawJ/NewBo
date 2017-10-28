<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_ico_txnpay".
 *
 * @property integer $txn_id
 * @property string $txn_purpose
 * @property string $txn_payer_name
 * @property string $txn_payer_channel
 * @property string $txn_amount
 */
class Txnpay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ico_txnpay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txn_purpose', 'txn_payer_name', 'txn_payer_channel', 'txn_amount'], 'required'],
            [['txn_purpose', 'txn_payer_name', 'txn_payer_channel', 'txn_amount'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txn_id' => 'Instamojo ID',
            'txn_payment_id' => 'Reference No',
            'txn_purpose' => 'Purpose',
            'txn_payer_name' => 'Payer Name',
            'txn_payer_channel' => 'Payer Channel',
            'txn_date' => 'Date',
            'txn_amount' => 'Amount',
        ];
    }
}
