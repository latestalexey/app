<?php

namespace app\modules\armada\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armada\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\modules\armada\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cDate', 'uDate', 'userID'], 'integer'],
            [['name', 'contact_person', 'contact_office', 'contact_hp', 'address'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Customer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cDate' => $this->cDate,
            'uDate' => $this->uDate,
            'userID' => $this->userID,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'contact_office', $this->contact_office])
            ->andFilterWhere(['like', 'contact_hp', $this->contact_hp])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
