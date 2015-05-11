<?php

namespace app\modules\asset\models;

use Yii;

/**
 * This is the model class for table "tbl_person".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $country_id
 * @property integer $parent_id
 *
 * @property TblCountry $country
 */
class Person extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['first_name', 'last_name'], 'required'],
            [['country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 60]
        ];
    }

    public function getFullname() {
        return $this->first_name . '.' . $this->last_name;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            //    'first_name' => 'First Name',
            //     'last_name' => 'Last Name',
            'country_id' => 'Country ID',
            //     'parent_id' => 'Parent ID',
            'fullname' => Yii::t('app', 'Fullname'),
            'countryName' => Yii::t('app', 'Country Name')
        ];
    }

    public function getCountryName() {
        return $this->country->country_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry() {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}
