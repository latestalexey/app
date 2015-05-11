<?php

namespace app\modules\asset\models;

use Yii;

/**
 * This is the model class for table "t_peripheral".
 *
 * @property integer $id
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
 *
 * @property TComponent $flag0
 * @property TStatus $status0
 */
class Keyboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_peripheral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_asset', 'name', 'flag'], 'string'],
            [['name'], 'required'],
            [['port', 'status', 'statusPeripheral', 'cDate', 'uDate', 'idUser'], 'integer'],
            [['purchaseDate'], 'safe']
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlag0()
    {
        return $this->hasOne(TComponent::className(), ['id' => 'flag']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TStatus::className(), ['id' => 'status']);
    }
}
