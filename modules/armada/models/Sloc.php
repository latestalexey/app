<?php

namespace app\modules\armada\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "sloc".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $dDate
 * @property integer $userID
 */
class Sloc extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sloc';
    }

    public static function primaryKey() {
        return array('id');
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
            [['id'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'Sloc ID',
            'name' => 'Sloc Name',
            'status' => 'Status',
            'create_at' => 'createDate',
            'update_at' => 'updateDate',
            'userID' => 'username',
        ];
    }

}
