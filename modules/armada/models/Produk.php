<?php

namespace app\modules\armada\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "produk".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property integer $create_at
 * @property integer $update_at
 * @property integer $userID
 */
class Produk extends \yii\db\ActiveRecord {

    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'produk';
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
    public function rules() {
        return [
            [['id'], 'required'],
            [['status', 'create_at', 'update_at', 'userID'], 'integer'],
            [['id'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50]
        ];
    }

    function getStatusOptions() {
        return array(
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_UNACTIVE => 'Not Active',
        );
    }
/*
    public static function dropdown() {
        $models = status::find()->all();
        foreach ($models as $model) {
            $dropdown[$model->id] = $model->name;
        }
        return $dropdown;
    }
 * 
 */

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID Produk',
            'name' => 'Name',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'userID' => 'User ID',
        ];
    }

    /*
      public static function itemAlias($type, $code = NULL) {
      return [
      'statusLokasi' => array('LT.01' => 'LT.01', 'LT.02' => 'LT.02', 'LT.03' => 'LT.03', 'LT.04' => 'LT.04'),
      'statusPemakai' => array('0' => 'not in use', '1' => 'in use')
      ];
      if (isset($code))
      return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
      else
      return isset($_items[$type]) ? $_items[$type] : false;
      },


     */
}
