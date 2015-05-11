<?php

namespace app\modules\asset\models;

use Yii;

/**
 * This is the model class for table "tbl_country".
 *
 * @property integer $id
 * @property string $country_name
 *
 * @property TblPerson[] $tblPeople
 */
class Country extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_country';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['country_name'], 'required'],
            [['country_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'country_name' => 'Country Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     
    public function getTblPeople() {
        return $this->hasMany(TblPerson::className(), ['country_id' => 'id']);
    }
     * 
     * @return \yii\db\ActiveQuery
     */

    public function getCountry() {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /* Getter for country name */

    public function getCountryName() {
        return $this->country->country_name;
    }

}
