<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "CustomerTransactions".
 *
 * @property string $TransactionNumber
 * @property string $TransactionDate
 * @property string $SLoc
 * @property string $CustId
 * @property integer $IsProcessed
 * @property integer $IsCancelled
 *
 * @property CustomerTransactionDetails[] $customerTransactionDetails
 * @property Products[] $prods
 * @property Customers $cust
 * @property SLocs $sLoc
 * @property Tokens[] $tokens
 */
class CustomerTransactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CustomerTransactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TransactionNumber', 'TransactionDate', 'SLoc', 'CustId', 'IsProcessed', 'IsCancelled'], 'required'],
            [['TransactionNumber', 'SLoc', 'CustId'], 'string'],
            [['TransactionDate'], 'safe'],
            [['IsProcessed', 'IsCancelled'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TransactionNumber' => 'Transaction Number',
            'TransactionDate' => 'Transaction Date',
            'SLoc' => 'Sloc',
            'CustId' => 'Cust ID',
            'IsProcessed' => 'Is Processed',
            'IsCancelled' => 'Is Cancelled',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTransactionDetails()
    {
        return $this->hasMany(CustomerTransactionDetails::className(), ['TransactionNumber' => 'TransactionNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds()
    {
        return $this->hasMany(Products::className(), ['ProdId' => 'ProdId'])->viaTable('CustomerTransactionDetails', ['TransactionNumber' => 'TransactionNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCust()
    {
        return $this->hasOne(Customers::className(), ['CustId' => 'CustId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSLoc()
    {
        return $this->hasOne(SLocs::className(), ['SLoc' => 'SLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Tokens::className(), ['TransactionNumber' => 'TransactionNumber']);
    }
}
