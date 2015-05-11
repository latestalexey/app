<?php

namespace app\modules\ar\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property integer $id
 * @property string $SlocID
 * @property integer $CustID
 * @property string $prodID
 * @property integer $qty
 * @property string $tglPesan
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 *
 * @property Sloc $sloc
 * @property Produk $prod
 * @property Customer $cust
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['SlocID', 'CustID', 'prodID', 'qty', 'tglPesan'], 'required'],
            [['prodID', 'qty'], 'required'],
            [['CustID', 'qty', 'cDate', 'uDate', 'userID'], 'integer'],
            [['tglPesan'], 'safe'],
            [['SlocID'], 'string', 'max' => 5],
            [['prodID'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'SlocID' => 'Sloc ID',
            'CustID' => 'Cust ID',
            'prodID' => 'Produk',
            'qty' => 'Qty',
            'tglPesan' => 'Tgl Pesan',
            'cDate' => 'C Date',
            'uDate' => 'U Date',
            'userID' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSloc()
    {
        return $this->hasOne(Sloc::className(), ['id' => 'SlocID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Produk::className(), ['id' => 'prodID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCust()
    {
        return $this->hasOne(Customer::className(), ['id' => 'CustID']);
    }
}
