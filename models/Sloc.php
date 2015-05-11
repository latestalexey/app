<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sloc".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property integer $create_at
 * @property integer $update_at
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
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
