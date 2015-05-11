<?php

namespace app\modules\b2b\models;

use Yii;

/**
 * This is the model class for table "CustomerSLocs".
 *
 * @property string $CustId
 * @property string $SLoc
 * @property integer $IsActive
 * @property string $RowVer
 *
 * @property Customers $cust
 * @property SLocs $sLoc
 */
class CustomerSLocs extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'CustomerSLocs';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['CustId', 'SLoc'], 'required'],
            [['CustId'], 'string', 'max' => 10],
            [['SLoc'], 'string', 'max' => 4],
            [['IsActive'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'CustId' => 'Cust ID',
            'SLoc' => 'Sloc',
            'IsActive' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCust() {
        return $this->hasOne(Customers::className(), ['CustId' => 'CustId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSLoc() {
        return $this->hasOne(SLocs::className(), ['SLoc' => 'SLoc']);
    }

}
