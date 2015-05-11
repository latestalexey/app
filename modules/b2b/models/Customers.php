<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "Customers".
 *
 * @property string $CustId
 * @property string $CustPassword
 * @property string $CustName
 * @property string $Address
 * @property string $City
 * @property string $PhoneNumber
 * @property string $ContactPerson
 * @property string $MobileNumber
 * @property string $RowVer
 *
 * @property CustomerTransactions[] $customerTransactions
 * @property CustomerSLocs[] $customerSLocs
 * @property SLocs[] $sLocs
 */
class Customers extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'Customers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['CustId', 'CustName', 'Address', 'City', 'PhoneNumber', 'ContactPerson', 'MobileNumber'], 'required'],
            [['CustId', 'CustPassword', 'CustName', 'Address', 'City', 'PhoneNumber', 'ContactPerson', 'MobileNumber'], 'string'],
            [['CustId'], 'string', 'max' => 10],
            [['CustId'], 'unique'],
            [['CustName', 'City','ContactPerson'], 'string', 'max' => 50],
            [['PhoneNumber', 'MobileNumber'], 'string', 'max' => 20]
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'CustId' => 'Customer ID',
            'CustPassword' => 'Cust Password',
            'CustName' => 'Customer Name',
            'Address' => 'Address',
            'City' => 'City',
            'PhoneNumber' => 'Phone Number',
            'ContactPerson' => 'Contact Person',
            'MobileNumber' => 'Mobile Number',
            'RowVer' => 'Row Ver',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTransactions() {
        return $this->hasMany(CustomerTransactions::className(), ['CustId' => 'CustId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerSLocs() {
        return $this->hasMany(CustomerSLocs::className(), ['CustId' => 'CustId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSLocs() {
        return $this->hasMany(SLocs::className(), ['SLoc' => 'SLoc'])->viaTable('CustomerSLocs', ['CustId' => 'CustId']);
    }

}
