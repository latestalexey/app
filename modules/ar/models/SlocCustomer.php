<?php

namespace app\modules\ar\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "sloc_customer".
 *
 * @property integer $id
 * @property string $SlocID
 * @property string $CustID
 * @property integer $status
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 */
class SlocCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sloc_customer';
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
            [['SlocID', 'CustID', 'status'], 'required'],
            [['status', 'cDate', 'uDate', 'userID'], 'integer'],
            [['SlocID'], 'string', 'max' => 5],
            [['CustID'], 'string', 'max' => 10],
            [['CustID'], 'unique']
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
            'status' => 'Status',
            'cDate' => 'C Date',
            'uDate' => 'U Date',
            'userID' => 'User ID',
        ];
    }
}
