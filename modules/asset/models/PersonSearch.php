<?php

namespace app\modules\asset\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\asset\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\modules\asset\models\Person`.
 */
class PersonSearch extends Person {

    /**
     * @inheritdoc
     */
    public $fullname;
    public $countryName;

    public function rules() {
        return [
            [['id', 'country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
            [['fullname'], 'safe'],
            [['countryName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    /*
      public function search($params) {
      $query = Person::find();

      $dataProvider = new ActiveDataProvider([
      'query' => $query,
      ]);
      $dataProvider->setSort([
      'attributes' => [
      'id',
      'fullName' => [
      'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
      'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
      'label' => 'Full Name',
      'default' => SORT_ASC
      ],
      'country_id'
      ]
      ]);

      if (!($this->load($params) && $this->validate())) {
      return $dataProvider;
      }

      $this->addCondition($query, 'id');
      $this->addCondition($query, 'first_name', true);
      $this->addCondition($query, 'last_name', true);
      $this->addCondition($query, 'country_id');

      /* Setup your custom filtering criteria

      // filter by person full name
      $query->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
      'OR last_name LIKE "%' . $this->fullName . '%"'
      );

      return $dataProvider;
      }
     */

    public function search($params) {
        $query = Person::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         #$this->load($params);
        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params) 
         * statement below
         */
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'fullName' => [
                    'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
                'countryName' => [
                    'asc' => ['tbl_country.country_name' => SORT_ASC],
                    'desc' => ['tbl_country.country_name' => SORT_DESC],
                    'label' => 'Country Name'
                ]
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            /**
             * The following line will allow eager loading with country data 
             * to enable sorting by country on initial loading of the grid.
             */
            $query->joinWith(['country']);
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'first_name', true);
        $this->addCondition($query, 'last_name', true);
        $this->addCondition($query, 'country_id');

        /* Add your filtering criteria */

        // filter by person full name
        $query->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
                'OR last_name LIKE "%' . $this->fullName . '%"'
        );

        // filter by country name
        $query->joinWith(['country' => function ($q) {
                $q->where('tbl_country.country_name LIKE "%' . $this->countryName . '%"');
            }]);

        return $dataProvider;
    }

    /*
      $this->load($params);

      if (!$this->validate()) {
      // uncomment the following line if you do not want to any records when validation fails
      // $query->where('0=1');
      return $dataProvider;
      }

      $query->andFilterWhere([
      'id' => $this->id,
      'country_id' => $this->country_id,
      'parent_id' => $this->parent_id,
      ]);

      $query->andFilterWhere(['like', 'first_name', $this->first_name])
      ->andFilterWhere(['like', 'last_name', $this->last_name]);

      return $dataProvider;
      }
     * 
     */
    
    protected function addCondition($query, $attribute, $partialMatch = false)
{
    if (($pos = strrpos($attribute, '.')) !== false) {
        $modelAttribute = substr($attribute, $pos + 1);
    } else {
        $modelAttribute = $attribute;
    }
 
    $value = $this->$modelAttribute;
    if (trim($value) === '') {
        return;
    }
 
    /* 
     * The following line is additionally added for right aliasing
     * of columns so filtering happen correctly in the self join
     */
    $attribute = "tbl_person.$attribute";
 
    if ($partialMatch) {
        $query->andWhere(['like', $attribute, $value]);
    } else {
        $query->andWhere([$attribute => $value]);
    }
}
}
