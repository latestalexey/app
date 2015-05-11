<?php

namespace app\modules\asset\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;


use Yii;

/**
 * This is the model class for table "t_peripheral".
 *
 * @property string $id
 * @property string $no_asset
 * @property string $name
 * @property integer $port
 * @property string $flag
 * @property integer $status
 * @property string $purchaseDate
 * @property integer $statusPeripheral
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $idUser
 */
class Motherboard extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_peripheral';
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
                ActiveRecord::EVENT_BEFORE_INSERT => ['idUser'],
                ActiveRecord::EVENT_BEFORE_UPDATE => 'idUser'
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
            [['name'], 'required'],
            [['port', 'status', 'statusPeripheral', 'cDate', 'uDate', 'idUser'], 'integer'],
            [['purchaseDate'], 'safe'],
            [['no_asset'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
            [['flag'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_asset' => 'No Asset',
            'name' => 'Name',
            'port' => 'Port',
            'flag' => 'Flag',
            'status' => 'Status',
            'purchaseDate' => 'Purchase Date',
            'statusPeripheral' => 'Status Peripheral',
            'cDate' => 'C Date',
            'uDate' => 'U Date',
            'idUser' => 'Id User',
        ];
    }
}
