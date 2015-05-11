<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property string $ProdId
 * @property string $ProdName
 * @property string $ProdAcronym
 * @property string $RowVer
 *
 * @property CustomerTransactionDetails[] $customerTransactionDetails
 * @property CustomerTransactions[] $transactionNumbers
 */
class Products extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'Products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ProdId', 'ProdName', 'ProdAcronym'], 'required'],
            [['ProdId'], 'unique'],
            [['ProdId'], 'string', 'max' => 7],
            [['ProdName'], 'string', 'max' => 50],
            [['ProdAcronym'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ProdId' => 'Prod ID',
            'ProdName' => 'Prod Name',
            'ProdAcronym' => 'Prod Acronym',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTransactionDetails() {
        return $this->hasMany(CustomerTransactionDetails::className(), ['ProdId' => 'ProdId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionNumbers() {
        return $this->hasMany(CustomerTransactions::className(), ['TransactionNumber' => 'TransactionNumber'])->viaTable('CustomerTransactionDetails', ['ProdId' => 'ProdId']);
    }

}
