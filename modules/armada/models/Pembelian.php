<?php

namespace app\modules\armada\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "pembelian".
 *
 * @property integer $id
 * @property integer $SlocustomerID
 * @property string $prodID
 * @property integer $qty
 * @property string $tglPesan
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 *
 * @property Produk $prod
 * @property SlocCustomer $slocustomer
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
    
     public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'update_at',
                ],
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['userID'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'userID',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SlocustomerID', 'qty', 'create_at', 'update_at', 'userID'], 'integer'],
            [['prodID', 'qty'], 'required'],
            [['tglPesan'], 'safe'],
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
            'SlocustomerID' => 'Customer ID',
            'prodID' => 'Produk',
            'qty' => 'Qty',
            'tglPesan' => 'Tgl Pesan',
            'create_at' => 'C Date',
            'update_at' => 'U Date',
            'userID' => 'User ID',
        ];
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
    public function getSlocustomer()
    {
        return $this->hasOne(SlocCustomer::className(), ['id' => 'SlocustomerID']);
    }
}
