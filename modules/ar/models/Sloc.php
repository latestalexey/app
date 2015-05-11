<?php

namespace app\modules\ar\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "sloc".
 *
 * @property string $id
 * @property string $name
 * @property integer $cDate
 * @property integer $uDate
 * @property integer $userID
 */
class Sloc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sloc';
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
            [['cDate', 'uDate', 'userID'], 'integer'],
            [['id'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Sloc ID',
            'name' => 'Sloc Name',
            'cDate' => 'createDate',
            'uDate' => 'updateDate',
            'userID' => 'username',
        ];
    }
}
