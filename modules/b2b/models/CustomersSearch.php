<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\Customers;

/**
 * CustomersSearch represents the model behind the search form about `app\modules\b2b\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustId', 'CustName', 'Address', 'City', 'PhoneNumber', 'ContactPerson', 'MobileNumber', 'RowVer'], 'safe'],
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
        $query = Customers::find();

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
            'RowVer' => $this->RowVer,
        ]);

        $query->andFilterWhere(['like', 'CustId', $this->CustId])
            ->andFilterWhere(['like', 'CustName', $this->CustName])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'PhoneNumber', $this->PhoneNumber])
            ->andFilterWhere(['like', 'ContactPerson', $this->ContactPerson])
            ->andFilterWhere(['like', 'MobileNumber', $this->MobileNumber]);

        return $dataProvider;
    }
}
