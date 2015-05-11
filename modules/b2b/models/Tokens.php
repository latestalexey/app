<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "Tokens".
 *
 * @property string $TokenId
 * @property string $TokenNumber
 * @property string $TransactionNumber
 *
 * @property CustomerTransactions $transactionNumber
 */
class Tokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TokenId', 'TokenNumber', 'TransactionNumber'], 'required'],
            [['TokenId', 'TokenNumber', 'TransactionNumber'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TokenId' => 'Token ID',
            'TokenNumber' => 'Token Number',
            'TransactionNumber' => 'Transaction Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionNumber()
    {
        return $this->hasOne(CustomerTransactions::className(), ['TransactionNumber' => 'TransactionNumber']);
    }
}
