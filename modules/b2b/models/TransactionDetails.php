<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "CustomerTransactionDetails".
 *
 * @property string $TransactionNumber
 * @property string $ProdId
 * @property integer $Quantity
 *
 * @property CustomerTransactions $transactionNumber
 * @property Products $prod
 */
class TransactionDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CustomerTransactionDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TransactionNumber', 'ProdId', 'Quantity'], 'required'],
            [['TransactionNumber', 'ProdId'], 'string'],
            [['Quantity'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TransactionNumber' => 'Transaction Number',
            'ProdId' => 'Prod ID',
            'Quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionNumber()
    {
        return $this->hasOne(CustomerTransactions::className(), ['TransactionNumber' => 'TransactionNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Products::className(), ['ProdId' => 'ProdId']);
    }
}
