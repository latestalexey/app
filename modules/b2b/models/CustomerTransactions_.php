<?php

namespace app\modules\b2b\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
 use yii\db\Expression;

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
 * @property Customers $cust
 * @property SLocs $sLoc
 * @property CustomerTransactionDetails[] $customerTransactionDetails
 * @property Products[] $prods
 * @property Tokens[] $tokens
 */
class CustomerTransactions extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'CustomerTransactions';
    }

    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'TransactionNumber', // required
                'group' => 'CustomerTransactions', // required, unique
                'value' => date('ymd') . '?', // ? will replace with generated number
                'digit' => 5, // specify this if you need leading zero for number
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['TransactionDate'],
                ],
               'value' => new Expression('datetimeFormat()'),
            
            ],
            'class' => 'mdm\behaviors\ar\RelationBehavior',
        ];
    }
    
//    public function beforeSave($insert)
//    {
//
//        if (parent::beforeSave($insert)) {
//
//            if ($this->isNewRecord) {
//                $this->TransactionDate = new \yii\db\Expression('getdate()');
//            }
//            return true;
//        }
//
//    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            //     [['TransactionNumber'],'mdm\autonumber\NextValueValidator','format'=>date('Ymd').'.?'],
       //     [['CustId', 'Sloc'], 'string'],
            [['TransactionDate'], 'safe'],
            [['IsProcessed', 'IsCancelled'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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
    public function getCust() {
        return $this->hasOne(Customers::className(), ['CustId' => 'CustId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSLoc() {
        return $this->hasMany(SLocs::className(), ['SLoc' => 'SLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTransactionDetails() {
        return $this->hasMany(CustomerTransactionDetails::className(), ['TransactionNumber' => 'TransactionNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds() {
        return $this->hasMany(Products::className(), ['ProdId' => 'ProdId'])->viaTable('CustomerTransactionDetails', ['TransactionNumber' => 'TransactionNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens() {
        return $this->hasMany(Tokens::className(), ['TransactionNumber' => 'TransactionNumber']);
    }

}
