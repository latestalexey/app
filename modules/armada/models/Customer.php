<?php

namespace app\modules\armada\models;

use Yii;

/**
 * This is the model class for table "Customer".
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
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Customer';
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
}
