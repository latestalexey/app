<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "SLocs".
 *
 * @property string $SLoc
 * @property string $Description
 * @property string $RowVer
 *
 * @property CustomerTransactions[] $customerTransactions
 * @property CustomerSLocs[] $customerSLocs
 * @property Customers[] $custs
 */
class SLocs extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'SLocs';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['SLoc', 'Description'], 'required'],
            [['SLoc'], 'unique'],
            [['SLoc'], 'string', 'max' => 4],
            [['Description'], 'string', 'max' => 50]
        ];
    }

    public function getSlocName() {
        return $this->Sloc . ' ' . $this->Description;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'SLoc' => 'Sloc',
            'Description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTransactions() {
        return $this->hasMany(CustomerTransactions::className(), ['SLoc' => 'SLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerSLocs() {
        return $this->hasMany(CustomerSLocs::className(), ['SLoc' => 'SLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCusts() {
        return $this->hasMany(Customers::className(), ['CustId' => 'CustId'])->viaTable('CustomerSLocs', ['SLoc' => 'SLoc']);
    }

}
