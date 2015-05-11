<?php

namespace app\modules\ar\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property string $id
 * @property string $name
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 *
 * @property Pembelian[] $pembelians
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

      public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['cDate', 'uDate'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'uDate',
                ],
            ],
            'blameable' => [
            'class' => BlameableBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['userID'],
                ActiveRecord::EVENT_BEFORE_UPDATE => 'userID'
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
            [['id'], 'required'],
            [['cDate', 'status', 'uDate', 'userID'], 'integer'],
            [['id'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Produk',
            'name' => 'Name',
            'cDate' => 'C Date',
            'uDate' => 'U Date',
            'userID' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['prodID' => 'id']);
    }
}
