<?php

namespace app\modules\ar\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $contact_person
 * @property string $contact_office
 * @property string $contact_hp
 * @property string $address
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 *
 * @property Pembelian[] $pembelians
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
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
            [['id', 'name'], 'required'],
            [['id', 'cDate', 'uDate', 'userID'], 'integer'],
            [['name', 'contact_person', 'contact_office', 'contact_hp'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Cust ID',
            'name' => 'Cust Name',
            'contact_person' => 'contact Person',
            'contact_office' => 'No.Contact Office',
            'contact_hp' => 'No.Contact Hp',
            'address' => 'Alamat',
            'cDate' => 'createDate',
            'uDate' => 'updateDate',
            'userID' => 'username',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['CustID' => 'id']);
    }
}
